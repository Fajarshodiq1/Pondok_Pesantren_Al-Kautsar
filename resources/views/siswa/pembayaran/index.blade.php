@extends('layouts.app')

@section('title', 'Pembayaran Santri - Pondok Pesantren')

@section('content')
<section class="bg-gradient-to-b from-primary-50 to-primary-100 min-h-screen py-8">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 pt-10">
        <div class="container mx-auto px-4">
            <!-- Page Header -->
            <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="relative px-6 py-8 md:px-8 md:py-10 text-white">
                    <!-- Islamic Pattern Overlay -->
                    <div class="absolute top-0 right-0 opacity-10">
                        <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M100 0L120 34.5L154.5 20L154.5 55.5L190 75.5L154.5 95.5L154.5 131L120 116.5L100 151L80 116.5L45.5 131L45.5 95.5L10 75.5L45.5 55.5L45.5 20L80 34.5L100 0Z"/>
                            <path fill="currentColor" d="M100 40L110 57.25L127.25 50L127.25 67.75L145 75.5L127.25 83.25L127.25 101L110 93.75L100 111L90 93.75L72.75 101L72.75 83.25L55 75.5L72.75 67.75L72.75 50L90 57.25L100 40Z"/>
                            <circle fill="currentColor" cx="100" cy="75.5" r="10"/>
                        </svg>
                    </div>
                    
                    <div class="relative">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div>
                                <h1 class="text-2xl md:text-3xl font-bold">Pembayaran Santri</h1>
                                <p class="mt-2 text-white/80">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</p>
                                <p class="mt-4">Kelola dan lihat riwayat pembayaran pondok pesantren Anda</p>
                            </div>
                            
                            <div class="mt-4 md:mt-0">
                                <a href="{{ route('siswa.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Kembali ke Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <!-- Info Pembayaran Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                        <div class="bg-secondary-100 px-6 py-4">
                            <h3 class="font-medium text-secondary-800">Informasi Pembayaran</h3>
                        </div>
                        <div class="p-6">
                            <div class="mb-6">
                                <h4 class="text-sm font-medium text-secondary-500 mb-1">Santri</h4>
                                <p class="text-secondary-800 font-medium">{{ Auth::guard('siswa')->user()->nama }}</p>
                            </div>
                            
                            <div class="flex items-center p-4 bg-primary-50 rounded-md mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-800">Total Pembayaran</h4>
                                    <p class="text-xl font-bold text-primary-600">
                                        Rp {{ number_format(Auth::guard('siswa')->user()->pembayarans->where('status', 'approved')->sum('nominal'), 0, ',', '.') }}/{{ number_format($totalTagihan ?? 0, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex justify-between text-sm">
                                    <span class="text-secondary-600">Total Tagihan</span>
                                    <span class="font-medium text-secondary-800">
                                        Rp {{ number_format($totalTagihan ?? 0, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-secondary-600">Status Pembayaran</span>
                                    <span class="font-medium">
                                        @if(($totalTagihan ?? 0) - Auth::guard('siswa')->user()->pembayarans->where('status', 'approved')->sum('nominal') <= 0)
                                            <span class="text-green-600">Lunas</span>
                                        @else
                                            <span class="text-red-600">Belum Lunas</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-secondary-600">Pembayaran Pending</span>
                                    <span class="font-medium">
                                        {{ Auth::guard('siswa')->user()->pembayarans->where('status', 'pending')->count() }} item
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Bank Info Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="bg-secondary-100 px-6 py-4">
                            <h3 class="font-medium text-secondary-800">Informasi Rekening</h3>
                        </div>
                        <div class="p-6">
                            <div class="border border-secondary-200 rounded-lg p-4 mb-4">
                                <div class="flex items-center mb-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-md flex items-center justify-center mr-3">
                                        <span class="text-blue-600 font-bold">BRI</span>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Bank BRI</h5>
                                        <p class="text-xs text-secondary-600">Bank Rakyat Indonesia</p>
                                    </div>
                                </div>
                                <div class="bg-secondary-50 rounded p-3 mb-2">
                                    <p class="font-mono text-secondary-800 font-medium select-all">123-456-789-0</p>
                                </div>
                                <p class="text-sm text-secondary-600">a.n. Yayasan Pondok Pesantren</p>
                            </div>

                            <div class="border border-secondary-200 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-md flex items-center justify-center mr-3">
                                        <span class="text-green-600 font-bold">BSI</span>
                                    </div>
                                    <div>
                                        <h5 class="font-medium">Bank Syariah Indonesia</h5>
                                        <p class="text-xs text-secondary-600">Bank Syariah Indonesia</p>
                                    </div>
                                </div>
                                <div class="bg-secondary-50 rounded p-3 mb-2">
                                    <p class="font-mono text-secondary-800 font-medium select-all">987-654-321-0</p>
                                </div>
                                <p class="text-sm text-secondary-600">a.n. Yayasan Pondok Pesantren</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <!-- Pembayaran Form Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                        <div class="bg-secondary-100 px-6 py-4">
                            <h3 class="font-medium text-secondary-800">Formulir Pembayaran Baru</h3>
                        </div>
                        <div class="p-6">
                            <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="jenis_pembayaran_id" class="block text-sm font-medium text-secondary-700 mb-1">Jenis Pembayaran</label>
                                        <select id="jenis_pembayaran_id" name="jenis_pembayaran_id" class="w-full rounded-md border-secondary-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50" required>
                                            <option value="">Pilih Jenis Pembayaran</option>
                                            @foreach($jenisPembayarans as $jenisPembayaran)
                                                <option value="{{ $jenisPembayaran->id }}" data-nominal="{{ $jenisPembayaran->nominal }}">{{ $jenisPembayaran->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="nominal" class="block text-sm font-medium text-secondary-700 mb-1">Nominal</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-secondary-500 sm:text-sm">Rp</span>
                                            </div>
                                            <input type="text" name="nominal" id="nominal" class="w-full rounded-md border-secondary-300 pl-12 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50" placeholder="0" readonly>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="bulan" class="block text-sm font-medium text-secondary-700 mb-1">Bulan</label>
                                        <select id="bulan" name="bulan" class="w-full rounded-md border-secondary-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50" required>
                                            <option value="">Pilih Bulan</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="tahun" class="block text-sm font-medium text-secondary-700 mb-1">Tahun</label>
                                        <select id="tahun" name="tahun" class="w-full rounded-md border-secondary-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50" required>
                                            <option value="">Pilih Tahun</option>
                                            @for($i = date('Y') - 2; $i <= date('Y') + 2; $i++)
                                                <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="bukti_pembayaran" class="block text-sm font-medium text-secondary-700 mb-1">Bukti Pembayaran</label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-secondary-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-secondary-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-secondary-600">
                                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                                        <span>Upload bukti transfer</span>
                                                        <input id="file-upload" name="bukti_pembayaran" type="file" class="sr-only" required>
                                                    </label>
                                                    <p class="pl-1">atau seret dan lepas</p>
                                                </div>
                                                <p class="text-xs text-secondary-500">
                                                    PNG, JPG, JPEG hingga 2MB
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="keterangan" class="block text-sm font-medium text-secondary-700 mb-1">Keterangan (Opsional)</label>
                                        <textarea id="keterangan" name="keterangan" rows="3" class="w-full rounded-md border-secondary-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50" placeholder="Tambahkan catatan pembayaran jika diperlukan"></textarea>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-md shadow-sm transition-colors duration-150 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Kirim Pembayaran
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
    
                    <!-- Riwayat Pembayaran Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="bg-secondary-100 px-6 py-4">
                            <h3 class="font-medium text-secondary-800">Riwayat Pembayaran</h3>
                        </div>
                        <div class="p-6">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-secondary-200">
                                    <thead class="bg-secondary-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-500 uppercase tracking-wider">
                                                Jenis Pembayaran
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-500 uppercase tracking-wider">
                                                Periode
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-500 uppercase tracking-wider">
                                                Nominal
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-500 uppercase tracking-wider">
                                                Tanggal
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-500 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-500 uppercase tracking-wider">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-secondary-200">
                                        @forelse(Auth::guard('siswa')->user()->pembayarans as $pembayaran)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-secondary-900">{{ $pembayaran->jenisPembayaran->nama }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-secondary-900">{{ $pembayaran->nama_bulan }} {{ $pembayaran->tahun }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-secondary-900">Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-secondary-900">{{ $pembayaran->tanggal_pembayaran->format('d M Y') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($pembayaran->status == 'approved')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Disetujui
                                                </span>
                                                @elseif($pembayaran->status == 'pending')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Menunggu
                                                </span>
                                                @elseif($pembayaran->status == 'rejected')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Ditolak
                                                </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('pembayaran.detail', $pembayaran->id) }}" class="text-primary-600 hover:text-primary-900">Detail</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-secondary-500 text-center">
                                                Belum ada riwayat pembayaran
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Auto-fill nominal field when jenis pembayaran changes
    document.getElementById('jenis_pembayaran_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const nominal = selectedOption.getAttribute('data-nominal');
        
        if (nominal) {
            // Format nominal to Rupiah
            const formattedNominal = new Intl.NumberFormat('id-ID').format(nominal);
            document.getElementById('nominal').value = formattedNominal;
        } else {
            document.getElementById('nominal').value = '';
        }
    });

   document.getElementById('file-upload').addEventListener('change', function (event) {
        const [file] = event.target.files;
        const preview = document.getElementById('preview-image');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
