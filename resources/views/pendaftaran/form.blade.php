@extends('layouts.app')

@section('title', 'Pendaftaran Santri Baru - Pondok Pesantren')

@section('content')
<section class="bg-gradient-to-b from-primary-50 to-primary-100 min-h-screen py-8">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 pt-10">
        <div class="container mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-primary-800">Pendaftaran Santri Baru</h1>
                <p class="text-lg text-gray-600 mt-2">Pondok Pesantren</p>
            </div>

            <!-- Registration Form Card -->
            <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-md overflow-hidden mb-12">
                <!-- Islamic Pattern Banner -->
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 opacity-10">
                        <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M100 0L120 34.5L154.5 20L154.5 55.5L190 75.5L154.5 95.5L154.5 131L120 116.5L100 151L80 116.5L45.5 131L45.5 95.5L10 75.5L45.5 55.5L45.5 20L80 34.5L100 0Z"/>
                            <path fill="currentColor" d="M100 40L110 57.25L127.25 50L127.25 67.75L145 75.5L127.25 83.25L127.25 101L110 93.75L100 111L90 93.75L72.75 101L72.75 83.25L55 75.5L72.75 67.75L72.75 50L90 57.25L100 40Z"/>
                            <circle fill="currentColor" cx="100" cy="75.5" r="10"/>
                        </svg>
                    </div>
                    
                    <div class="relative text-center">
                        <h2 class="text-2xl font-bold text-white">Formulir Pendaftaran</h2>
                        <p class="mt-2 text-white/80">Silakan lengkapi data diri Anda dengan benar</p>
                        <p class="mt-1 text-white/70 font-kufi text-sm">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</p>
                    </div>
                </div>

                <div class="p-6 md:p-8">
                    @if ($errors->any())
                        <div class="bg-red-50 text-red-800 px-4 py-3 rounded-md mb-6">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('siswa.pendaftaran.proses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8">
                            <!-- Personal Information Section -->
                            <div class="md:col-span-2">
                                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Informasi Pribadi
                                </h3>
                                <div class="h-0.5 bg-gray-200 mb-6"></div>
                            </div>
                            <div>
                                <label for="program_id" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin <span class="text-red-600">*</span></label>
                                <select id="program_id" name="program_id" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                                        <option value="">Pilih Program</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Nama Lengkap -->
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-600">*</span></label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- NIK -->
                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK (Nomor Induk Kependudukan) <span class="text-red-600">*</span></label>
                                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin <span class="text-red-600">*</span></label>
                                <select id="jenis_kelamin" name="jenis_kelamin" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <!-- No Telepon -->
                            <div>
                                <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon <span class="text-red-600">*</span></label>
                                <input type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                                <p class="text-xs text-gray-500 mt-1">Format: 08xxxxxxxxxx</p>
                            </div>

                            <!-- Tempat Lahir -->
                            <div>
                                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir <span class="text-red-600">*</span></label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir <span class="text-red-600">*</span></label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Alamat -->
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap <span class="text-red-600">*</span></label>
                                <textarea id="alamat" name="alamat" rows="3" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">{{ old('alamat') }}</textarea>
                                <p class="text-xs text-gray-500 mt-1">Sertakan RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten, dan Provinsi</p>
                            </div>

                            <!-- Academic Information Section -->
                            <div class="md:col-span-2 mt-4">
                                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                    Informasi Akademik
                                </h3>
                                <div class="h-0.5 bg-gray-200 mb-3"></div>
                            </div>

                            <!-- riwayat pendidikan -->
                            <div>
                                <label for="riwayat_pendidikan" class="block text-sm font-medium text-gray-700 mb-1">Riwayat Pendidikan<span class="text-red-600">*</span></label>
                                <select name="riwayat_pendidikan" id="riwayat_pendidikan" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                                    <option value="">Pilih Riwayat Pendidikan</option>
                                    <option value="SD/MI" {{ old('riwayat_pendidikan') === 'SD/MI' ? 'selected' : '' }}>Sekolah Dasar/Madrasah Ibtidaiah</option>
                                    <option value="MTS/SMP" {{ old('riwayat_pendidikan') === 'MTS/SMP' ? 'selected' : '' }}>Sekolah Menengah Pertama/Madrasah Tsanawiyah</option>                                    
                                </select>
                            </div>
                            <!-- Sekolah Asal -->
                            <div>
                                <label for="sekolah_asal" class="block text-sm font-medium text-gray-700 mb-1">Sekolah Asal <span class="text-red-600">*</span></label>
                                <input type="text" id="sekolah_asal" name="sekolah_asal" value="{{ old('sekolah_asal') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <div class="md:col-span-2 mt-4">
                                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                    Informasi Orang Tua/Wali
                                </h3>
                                <div class="h-0.5 bg-gray-200 mb-3"></div>
                            </div>

                            <!-- nama ayah -->
                            <div>
                                <label for="nama_ayah" class="block text-sm font-medium text-gray-700 mb-1">Nama Ayah <span class="text-red-600">*</span></label>
                                <input type="text" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            <div>
                                <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan Ayah <span class="text-red-600">*</span></label>
                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            <div>
                                <label for="no_telepon_ayah" class="block text-sm font-medium text-gray-700 mb-1">No Telp Ayah <span class="text-red-600">*</span></label>
                                <input type="number" id="no_telepon_ayah" name="no_telepon_ayah" value="{{ old('no_telepon_ayah') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            <div>
                                <label for="nama_ibu" class="block text-sm font-medium text-gray-700 mb-1">Nama Ibu <span class="text-red-600">*</span></label>
                                <input type="text" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            <div>
                                <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan Ibu <span class="text-red-600">*</span></label>
                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            <div>
                                <label for="no_telepon_ibu" class="block text-sm font-medium text-gray-700 mb-1">No Telp Ibu <span class="text-red-600">*</span></label>
                                <input type="number" id="no_telepon_ibu" name="no_telepon_ibu" value="{{ old('no_telepon_ibu') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            <!-- Upload Foto Section -->
                            <div class="md:col-span-2 mt-4">
                                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Upload Dokumen
                                </h3>
                                <div class="h-0.5 bg-gray-200 mb-6"></div>
                            </div>
                            <!-- Pas Foto -->
                            <div class="md:col-span-full flex items-center gap-5 flex-col md:flex-row">
                                <div class="flex-1">
                                    <label for="pas_foto" class="block text-sm font-medium text-gray-700 mb-3">Pas Foto <span class="text-red-600">*</span></label>
                                    
                                    <div class="flex items-center gap-2 flex-col">
                                        <div class="w-32 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
                                            <img id="preview-image" src="" alt="Preview" class="w-full h-full object-cover hidden">
                                            <div id="placeholder" class="text-center p-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p class="mt-1 text-xs text-gray-500">3x4 cm</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex-1">
                                            <div class="flex items-center justify-center w-full">
                                                <label for="pas_foto" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                        </svg>
                                                        <p class="mb-1 text-sm text-gray-500">Klik untuk upload foto</p>
                                                        <p class="text-xs text-gray-500">PNG, JPG (Max. 2MB)</p>
                                                    </div>
                                                    <input id="pas_foto" name="pas_foto" type="file" accept="image/*" class="hidden" required />
                                                </label>
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500">
                                                * Pas foto dengan latar belakang berwarna<br>
                                                * Mengenakan pakaian sopan dan rapi<br>
                                                * Foto terbaru (maksimal 3 bulan terakhir)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <label for="pas_foto" class="block text-sm font-medium text-gray-700 mb-3">Kartu Keluarga <span class="text-red-600">*</span></label>
                                    
                                    <div class="flex items-center gap-2 flex-col">
                                        <div class="w-32 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
                                            <img id="preview-image2" src="" alt="Preview" class="w-full h-full object-cover hidden">
                                            <div id="placeholder2" class="text-center p-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p class="mt-1 text-xs text-gray-500">3x4 cm</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex-1">
                                            <div class="flex items-center justify-center w-full">
                                                <label for="kk" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                        </svg>
                                                        <p class="mb-1 text-sm text-gray-500">Klik untuk upload foto</p>
                                                        <p class="text-xs text-gray-500">PNG, JPG (Max. 2MB)</p>
                                                    </div>
                                                    <input id="kk" name="kk" type="file" accept="image/*" class="hidden" required />
                                                </label>
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500">
                                                * Pas foto dengan latar belakang berwarna<br>
                                                * Mengenakan pakaian sopan dan rapi<br>
                                                * Foto terbaru (maksimal 3 bulan terakhir)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <label for="ijazah" class="block text-sm font-medium text-gray-700 mb-3">Ijazah<span class="text-red-600">*</span></label>
                                    
                                    <div class="flex items-center gap-2 flex-col">
                                        <div class="w-32 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
                                            <img id="preview-image3" src="" alt="Preview" class="w-full h-full object-cover hidden">
                                            <div id="placeholder3" class="text-center p-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p class="mt-1 text-xs text-gray-500">3x4 cm</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex-1">
                                            <div class="flex items-center justify-center w-full">
                                                <label for="ijazah" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                        </svg>
                                                        <p class="mb-1 text-sm text-gray-500">Klik untuk upload foto</p>
                                                        <p class="text-xs text-gray-500">PNG, JPG (Max. 2MB)</p>
                                                    </div>
                                                    <input id="ijazah" name="ijazah" type="file" accept="image/*" class="hidden" required />
                                                </label>
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500">
                                                * Pas foto dengan latar belakang berwarna<br>
                                                * Mengenakan pakaian sopan dan rapi<br>
                                                * Foto terbaru (maksimal 3 bulan terakhir)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <label for="akta_lahir" class="block text-sm font-medium text-gray-700 mb-3">Akta Kelahiran <span class="text-red-600">*</span></label>
                                    
                                    <div class="flex items-center gap-2 flex-col">
                                        <div class="w-32 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
                                            <img id="preview-image4" src="" alt="Preview" class="w-full h-full object-cover hidden">
                                            <div id="placeholder4" class="text-center p-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p class="mt-1 text-xs text-gray-500">3x4 cm</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex-1">
                                            <div class="flex items-center justify-center w-full">
                                                <label for="akta_lahir" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                        </svg>
                                                        <p class="mb-1 text-sm text-gray-500">Klik untuk upload foto</p>
                                                        <p class="text-xs text-gray-500">PNG, JPG (Max. 2MB)</p>
                                                    </div>
                                                    <input id="akta_lahir" name="akta_lahir" type="file" accept="image/*" class="hidden" required />
                                                </label>
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500">
                                                * Pas foto dengan latar belakang berwarna<br>
                                                * Mengenakan pakaian sopan dan rapi<br>
                                                * Foto terbaru (maksimal 3 bulan terakhir)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Account Information Section -->
                            <div class="md:col-span-2 mt-4">
                                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Informasi Akun
                                </h3>
                                <div class="h-0.5 bg-gray-200 mb-6"></div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-600">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-600">*</span></label>
                                <input type="password" id="password" name="password" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                                <p class="text-xs text-gray-500 mt-1">Minimal 8 karakter</p>
                            </div>

                            <!-- Password Confirmation -->
                            <div class="md:col-span-2">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password <span class="text-red-600">*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Terms and Agreement -->
                            <div class="md:col-span-2 mt-6">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="terms" name="terms" type="checkbox" required
                                        class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="terms" class="font-medium text-gray-700">Saya menyetujui syarat dan ketentuan pendaftaran <span class="text-red-600">*</span></label>
                                        <p class="text-gray-500 mt-1">Dengan mendaftar, saya menyatakan bahwa data yang saya masukkan adalah benar dan saya bersedia mengikuti segala peraturan yang berlaku di Pondok Pesantren.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="md:col-span-2 mt-8">
                                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                                    <button type="submit" class="flex-1 py-3 px-4 bg-primary-600 hover:bg-primary-700 rounded-md text-white font-medium transition-colors duration-150 ease-in-out text-center">
                                        Daftar Sekarang
                                    </button>
                                    <a href="/" class="flex-1 py-3 px-4 bg-gray-100 hover:bg-gray-200 rounded-md text-gray-700 font-medium transition-colors duration-150 ease-in-out text-center">
                                        Batal
                                    </a>
                                </div>
                                
                                <div class="text-center mt-6">
                                    <p class="text-gray-600">Sudah memiliki akun? 
                                        <a href="{{ route('siswa.login') }}" class="text-primary-600 hover:text-primary-800 font-medium">
                                            Masuk di sini
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Show image preview when uploading a new photo
    document.getElementById('pas_foto').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById('preview-image');
                const placeholder = document.getElementById('placeholder');
                
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
    document.getElementById('kk').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById('preview-image2');
                const placeholder = document.getElementById('placeholder2');
                
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
    document.getElementById('ijazah').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById('preview-image3');
                const placeholder = document.getElementById('placeholder3');
                
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
    document.getElementById('akta_lahir').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById('preview-image4');
                const placeholder = document.getElementById('placeholder4');
                
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection