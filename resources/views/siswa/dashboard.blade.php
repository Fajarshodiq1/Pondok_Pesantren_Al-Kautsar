@extends('layouts.app')

@section('title', 'Dashboard Santri - Pondok Pesantren')

@section('content')
<section class="bg-gradient-to-b from-primary-50 to-primary-100 min-h-screen py-8">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 pt-10">
        <div class="container mx-auto px-4">
            <!-- Welcome Banner -->
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
                                <h1 class="text-2xl md:text-3xl font-bold">Assalamu'alaikum, {{ Auth::guard('siswa')->user()->nama }}!</h1>
                                <p class="mt-2 text-white/80">ٱلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ ٱللَّٰهِ وَبَرَكَاتُهُ</p>
                                <p class="mt-4">Selamat datang di Sistem Informasi Santri Pondok Pesantren</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <!-- Profile Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                        <div class="bg-secondary-100 px-6 py-4">
                            <h3 class="font-medium text-secondary-800">Profil Santri</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex flex-col items-center">
                                <div class="w-32 h-32 bg-primary-100 rounded-full overflow-hidden mb-4 border-4 border-primary-200">
                                    @if(Auth::guard('siswa')->user()->pas_foto)
                                        <img src="{{ asset('storage/' . Auth::guard('siswa')->user()->pas_foto) }}" alt="Foto Profil" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-primary-200 text-primary-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <h4 class="text-lg font-medium text-secondary-800">{{ Auth::guard('siswa')->user()->nama }}</h4>
                                <p class="text-sm text-secondary-600">NIK: {{ Auth::guard('siswa')->user()->nik }}</p>
                            </div>
    
                            <div class="mt-6">
                                <a href="{{route('siswa.profile.edit')}}" class="w-full flex items-center justify-center px-4 py-2 bg-primary-600 hover:bg-primary-700 rounded-md text-white transition-colors duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    Edit Profil
                                </a>
                                <a href="#" class="mt-3 w-full flex items-center justify-center px-4 py-2 border border-red-300 hover:bg-red-50 rounded-md text-red-600 transition-colors duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
    
                    <!-- Status Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="bg-secondary-100 px-6 py-4">
                            <h3 class="font-medium text-secondary-800">Status Pendaftaran</h3>
                        </div>
                        <div class="p-6">
                            @if(Auth::guard('siswa')->user()->status)
                            <div class="flex items-center bg-green-50 text-green-800 px-4 py-3 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Aktif</span>
                            </div>
                            @else
                            <div class="flex items-center bg-red-50 text-red-800 px-4 py-3 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Tidak Aktif</span>
                            </div>
                            @endif
    
                            <div class="mt-4">
                                <div class="text-sm text-secondary-600">
                                    <p>Tanggal Pendaftaran:</p>
                                    <p class="font-medium text-secondary-800">{{ Auth::guard('siswa')->user()->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <!-- Personal Info Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                        <div class="bg-secondary-100 px-6 py-4 flex justify-between items-center">
                            <h3 class="font-medium text-secondary-800">Informasi Pribadi</h3>

                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Nama Lengkap</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->nama }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">NIK</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->nik }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Jenis Kelamin</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->jenis_kelamin }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Nomor Telepon</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->no_telepon }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Tempat Lahir</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->tempat_lahir }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Tanggal Lahir</h4>
                                    <p class="text-secondary-800">{{ \Carbon\Carbon::parse(Auth::guard('siswa')->user()->tanggal_lahir)->format('d M Y') }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Riwayat Pendidikan</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->riwayat_pendidikan }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Alamat</h4>
                                    <div class="text-secondary-800 prose">{!! Auth::guard('siswa')->user()->alamat !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- card informasi orang tua --}}
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                        <div class="bg-secondary-100 px-6 py-4 flex justify-between items-center">
                            <h3 class="font-medium text-secondary-800">Informasi Orang Tua</h3>

                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Nama Ayah</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->nama_ayah }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Pekerjaan Ayah</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->pekerjaan_ayah }}</p>
                                </div>
                                <div class="md:col-span-2">
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">No Tlp Ayah</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->no_telepon_ayah }}</p>
                                </div>
                                <hr class="col-span-2 my-4">
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Nama ibu</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->nama_ibu }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Pekerjaan ibu</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->pekerjaan_ibu }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">No Tlp ibu</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->no_telepon_ibu }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Academic Info Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                        <div class="bg-secondary-100 px-6 py-4 flex justify-between items-center">
                            <h3 class="font-medium text-secondary-800">Informasi Akademik</h3>

                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Sekolah Asal</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->sekolah_asal }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Email</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->email }}</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-secondary-500 mb-1">Program yang di Pilih</h4>
                                    <p class="text-secondary-800">{{ Auth::guard('siswa')->user()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Quotes Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-accent-500 to-accent-600 px-6 py-8 md:px-8">
                            <div class="flex flex-col md:flex-row items-center">
                                <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-center md:text-left">
                                    <p class="text-white font-medium">"Menuntut ilmu adalah kewajiban bagi setiap muslim laki-laki dan perempuan."</p>
                                    <p class="text-white/80 mt-2 text-sm font-kufi">طَلَبُ الْعِلْمِ فَرِيْضَةٌ عَلَى كُلِّ مُسْلِمٍ وَمُسْلِمَةٍ</p>
                                    <p class="text-white/70 mt-2 text-xs">- HR. Ibnu Majah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection