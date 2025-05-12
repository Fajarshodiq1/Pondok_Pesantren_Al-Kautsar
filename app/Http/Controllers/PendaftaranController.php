<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Siswa;
use App\Models\Tingkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function showFormPendaftaran()
    {   
        // Get all programs
        $programs = Program::all();
        return view('pendaftaran.form', compact('programs'));
    }
    
    public function prosesPendaftaran(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:siswas|size:16',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'no_telepon' => 'required|string|regex:/^08[0-9]{9,11}$/',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'riwayat_pendidikan' => 'required|string|in:SD/MI,MTS/SMP',
            'sekolah_asal' => 'required|string|max:255',
            // data orang tua
            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'no_telepon_ayah' => 'required|string|regex:/^08[0-9]{9,11}$/',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'no_telepon_ibu' => 'required|string|regex:/^08[0-9]{9,11}$/',
            // dokumen pendaftaran
            'akta_lahir' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'kk' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'ijazah' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'pas_foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|string|email|max:255|unique:siswas',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required',
        ], [
            'nik.size' => 'NIK harus terdiri dari 16 digit angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'no_telepon.regex' => 'Format nomor telepon tidak valid. Gunakan format 08xxxxxxxxxx.',
            'pas_foto.required' => 'Pas foto wajib diunggah.',
            'pas_foto.image' => 'File harus berupa gambar.',
            'pas_foto.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'pas_foto.max' => 'Ukuran gambar maksimal 2MB.',
            // dokumen pendaftaran
            'akta_lahir.file' => 'File harus berupa dokumen.',
            'akta_lahir.mimes' => 'Format dokumen harus jpeg, png, jpg, atau pdf.',
            'akta_lahir.max' => 'Ukuran dokumen maksimal 2MB.',
            'kk.file' => 'File harus berupa dokumen.',
            'kk.mimes' => 'Format dokumen harus jpeg, png, jpg, atau pdf.',
            'kk.max' => 'Ukuran dokumen maksimal 2MB.',
            'ijazah.file' => 'File harus berupa dokumen.',
            'ijazah.mimes' => 'Format dokumen harus jpeg, png, jpg, atau pdf.',
            'ijazah.max' => 'Ukuran dokumen maksimal 2MB.',
            'terms.required' => 'Anda harus menyetujui syarat dan ketentuan.',
        ]);
        
        // Handle file upload
        $fotoPath = null;
        if ($request->hasFile('pas_foto')) {
            $fotoPath = $request->file('pas_foto')->store('pas-foto', 'public');
        }
        
        // Use integer for status: 0 = pending, 1 = approved, 2 = rejected
        $siswa = Siswa::create([
            'program_id' => $request->program_id,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'riwayat_pendidikan' => $request->riwayat_pendidikan,
            'sekolah_asal' => $request->sekolah_asal,
            // data orang tua
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'no_telepon_ayah' => $request->no_telepon_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'no_telepon_ibu' => $request->no_telepon_ibu,
            // dokumen pendaftaran
            'akta_lahir' => $request->file('akta_lahir') ? $request->file('akta_lahir')->store('akta-lahir', 'public') : null,
            'kk' => $request->file('kk') ? $request->file('kk')->store('kk', 'public') : null,
            'ijazah' => $request->file('ijazah') ? $request->file('ijazah')->store('ijazah', 'public') : null,
            'pas_foto' => $fotoPath,
            // informasi login
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 0, // 0 = pending status
        ]);
        
        Auth::guard('siswa')->login($siswa);
        
        return redirect()->route('siswa.dashboard')->with('success', 'Pendaftaran berhasil! Silakan lengkapi dokumen tambahan jika diperlukan.');
    }
    
    public function showLoginForm()
    {
        return view('pendaftaran.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('siswa.dashboard'));
        }
        
        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ])->withInput($request->except('password'));
    }
    
    public function dashboard()
    {
        return view('siswa.dashboard');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}