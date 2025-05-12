<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jenis_pembayaran;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display the payment page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all active payment types
        $jenisPembayarans = Jenis_pembayaran::where('status', true)->get();
        
        // Calculate total bill (example calculation - adjust as needed)
        $totalTagihan = $jenisPembayarans->sum('nominal') * 12; // Assuming yearly payment
        
        return view('siswa.pembayaran.index', compact('jenisPembayarans', 'totalTagihan'));
    }
    
    /**
     * Store a newly created payment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'jenis_pembayaran_id' => 'required|exists:jenis_pembayarans,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:' . (date('Y') + 5),
            'keterangan' => 'nullable|string|max:255',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        // Check if payment for this month and type already exists
        $existingPayment = Pembayaran::where([
            'siswa_id' => Auth::guard('siswa')->id(),
            'jenis_pembayaran_id' => $request->jenis_pembayaran_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ])->first();
        
        if ($existingPayment) {
            if ($existingPayment->status === 'approved') {
                return redirect()->back()->with('error', 'Pembayaran untuk periode ini sudah disetujui sebelumnya.');
            } elseif ($existingPayment->status === 'pending') {
                return redirect()->back()->with('error', 'Pembayaran untuk periode ini sedang dalam proses verifikasi.');
            }
        }
        
        // Get the payment type to get the nominal amount
        $jenisPembayaran = Jenis_pembayaran::findOrFail($request->jenis_pembayaran_id);
        
        // Handle file upload
        $path = $request->file('bukti_pembayaran')->store('bukti-pembayaran', 'public');
        
        // Create new payment
        $pembayaran = new Pembayaran();
        $pembayaran->siswa_id = Auth::guard('siswa')->id();
        $pembayaran->jenis_pembayaran_id = $request->jenis_pembayaran_id;
        $pembayaran->bulan = $request->bulan;
        $pembayaran->tahun = $request->tahun;
        $pembayaran->nominal = $jenisPembayaran->nominal;
        $pembayaran->status = 'pending';
        $pembayaran->bukti_pembayaran = $path;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->tanggal_pembayaran = Carbon::now();
        $pembayaran->save();
        
        return redirect()->route('pembayaran')->with('success', 'Pembayaran berhasil dikirim dan sedang menunggu verifikasi admin.');
    }
    
    /**
     * Display the specified payment details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the payment and ensure it belongs to the logged-in student
        $pembayaran = Pembayaran::where('id', $id)
            ->where('siswa_id', Auth::guard('siswa')->id())
            ->firstOrFail();
            
        return view('siswa.pembayaran.detail', compact('pembayaran'));
    }
    
    /**
     * Cancel a pending payment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        // Find the payment and ensure it belongs to the logged-in student
        $pembayaran = Pembayaran::where('id', $id)
            ->where('siswa_id', Auth::guard('siswa')->id())
            ->where('status', 'pending') // Only allow cancellation for pending payments
            ->firstOrFail();
        
        // Delete the payment proof file
        if ($pembayaran->bukti_pembayaran) {
            Storage::disk('public')->delete($pembayaran->bukti_pembayaran);
        }
        
        // Delete the payment record
        $pembayaran->delete();
        
        return redirect()->route('siswa.pembayaran')->with('success', 'Pembayaran berhasil dibatalkan.');
    }
}