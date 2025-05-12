@extends('layouts.app')

@section('title', 'Detail Pembayaran - Pondok Pesantren')

@section('content')
<section class="bg-gradient-to-b from-primary-50 to-primary-100 min-h-screen py-8">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 pt-16">
        <div class="container mx-auto px-4">
            <!-- Page Header -->
            <div class="flex items-center mb-6">
                <a href="{{ route('pembayaran') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
                <h1 class="text-base font-bold text-secondary-800">Detail Pembayaran</h1>
            </div>
            
            <!-- Main Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pembayaran Info -->
                <div class="md:col-span-2 h-full">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                        <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                            <div class="flex justify-between items-center">
                                <h3 class="font-medium text-white">Informasi Pembayaran</h3>
                                <div>
                                    @if($pembayaran->status == 'approved')
                                    <span class="px-3 py-1 inline-flex text-sm font-medium rounded-full bg-green-100 text-green-800">
                                        Disetujui
                                    </span>
                                    @elseif($pembayaran->status == 'pending')
                                    <span class="px-3 py-1 inline-flex text-sm font-medium rounded-full bg-yellow-100 text-yellow-800">
                                        Menunggu
                                    </span>
                                    @elseif($pembayaran->status == 'rejected')
                                    <span class="px-3 py-1 inline-flex text-sm font-medium rounded-full bg-red-100 text-red-800">
                                        Ditolak
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">ID Pembayaran</h4>
                                    <p class="text-secondary-800 font-mono">#{{ str_pad($pembayaran->id, 6, '0', STR_PAD_LEFT) }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Jenis Pembayaran</h4>
                                    <p class="text-secondary-800">{{ $pembayaran->jenisPembayaran->nama }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Periode</h4>
                                    <p class="text-secondary-800">{{ $pembayaran->nama_bulan }} {{ $pembayaran->tahun }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Nominal</h4>
                                    <p class="text-xl font-bold text-primary-600">Rp {{ number_format($pembayaran->nominal, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Tanggal Pembayaran</h4>
                                    <p class="text-secondary-800">{{ $pembayaran->tanggal_pembayaran->format('d M Y, H:i') }} WIB</p>
                                </div>
                                @if($pembayaran->tanggal_approval)
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Tanggal Konfirmasi</h4>
                                    <p class="text-secondary-800">{{ $pembayaran->tanggal_approval->format('d M Y, H:i') }} WIB</p>
                                </div>
                                @endif
                                <div class="md:col-span-2">
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Keterangan</h4>
                                    <p class="text-secondary-800">{{ $pembayaran->keterangan ?: 'Tidak ada keterangan' }}</p>
                                </div>
                            </div>
                            
                            @if($pembayaran->status == 'rejected')
                            <div class="mt-6 bg-red-50 border border-red-200 text-red-800 p-4 rounded-lg">
                                <h4 class="font-medium">Alasan Penolakan</h4>
                                <p>{{ $pembayaran->alasan_penolakan }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Bukti Pembayaran -->
                <div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                        <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                            <h3 class="font-medium text-white">Bukti Pembayaran</h3>
                        </div>
                        
                        <div class="p-6">
                            @if($pembayaran->bukti_pembayaran)
                            <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="w-full h-auto rounded-lg shadow-md">
                            @else
                            <p class="text-secondary-800">Belum ada bukti pembayaran yang diunggah.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Catatan -->
                <div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                        <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                            <h3 class="font-medium text-white">Catatan</h3>
                        </div>
                        
                        <div class="p-6">
                            <p class="text-secondary-800">{{ $pembayaran->catatan ?: 'Tidak ada catatan' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection