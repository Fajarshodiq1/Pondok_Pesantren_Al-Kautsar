@extends('layouts.app')

@section('title', 'Edit Profil Santri - Pondok Pesantren')

@section('content')
<section class="bg-gradient-to-b from-primary-50 to-primary-100 min-h-screen py-16">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 pt-10">
        <div class="container mx-auto px-4">
            <!-- Breadcrumb -->
            <div class="mb-6">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-gray-600">
                        <li>
                            <a href="{{ route('siswa.dashboard') }}" class="hover:text-primary-600 transition">
                                Dashboard
                            </a>
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </li>
                        <li class="text-primary-600 font-medium">
                            Edit Profil
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Edit Profile Form Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Edit Profil Santri
                    </h2>
                </div>

                <div class="p-6">
                    @if (session('success'))
                        <div class="bg-green-50 text-green-800 px-4 py-3 rounded-md mb-6 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-50 text-red-800 px-4 py-3 rounded-md mb-6">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('siswa.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8">
                            <!-- Profile Picture Section -->
                            <div class="md:col-span-2 flex flex-col items-center pb-6 border-b border-gray-200">
                                <div class="mb-4">
                                    <div class="w-32 h-32 bg-primary-100 rounded-full overflow-hidden border-4 border-primary-200 relative group">
                                        @if(Auth::guard('siswa')->user()->pas_foto)
                                            <img id="preview-image" src="{{ asset('storage/' . Auth::guard('siswa')->user()->pas_foto) }}" alt="Foto Profil" class="w-full h-full object-cover">
                                        @else
                                            <div id="default-image" class="w-full h-full flex items-center justify-center bg-primary-200 text-primary-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <img id="preview-image" src="" alt="Foto Profil" class="w-full h-full object-cover hidden">
                                        @endif
                                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                            <span class="text-white text-sm font-medium">Ubah Foto</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" id="pas_foto" name="pas_foto" class="hidden" accept="image/*">
                                <button type="button" onclick="document.getElementById('pas_foto').click()" class="text-sm bg-primary-100 hover:bg-primary-200 text-primary-700 px-4 py-2 rounded-md transition-colors duration-150 ease-in-out">
                                    Pilih Foto
                                </button>
                                <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG. Maks 2MB</p>
                            </div>

                            <!-- Personal Info Section -->
                            <div class="col-span-2">
                                <h3 class="text-lg font-medium text-gray-800 mb-4">Informasi Pribadi</h3>
                            </div>

                            <!-- Nama Lengkap -->
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-600">*</span></label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama', Auth::guard('siswa')->user()->nama) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- NIK -->
                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK <span class="text-red-600">*</span></label>
                                <input type="text" id="nik" name="nik" value="{{ old('nik', Auth::guard('siswa')->user()->nik) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin <span class="text-red-600">*</span></label>
                                <select id="jenis_kelamin" name="jenis_kelamin" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', Auth::guard('siswa')->user()->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', Auth::guard('siswa')->user()->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <!-- No Telepon -->
                            <div>
                                <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon <span class="text-red-600">*</span></label>
                                <input type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', Auth::guard('siswa')->user()->no_telepon) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Tempat Lahir -->
                            <div>
                                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir <span class="text-red-600">*</span></label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', Auth::guard('siswa')->user()->tempat_lahir) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir <span class="text-red-600">*</span></label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
                                value="{{ old('tanggal_lahir', Auth::guard('siswa')->user()->tanggal_lahir ? \Carbon\Carbon::parse(Auth::guard('siswa')->user()->tanggal_lahir)->format('Y-m-d') : '') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat <span class="text-red-600">*</span></label>
                                <input id="alamat" type="hidden" name="alamat" value="{{ old('alamat', Auth::guard('siswa')->user()->alamat) }}">
                                <trix-editor input="alamat"></trix-editor>  
                            </div>

                            <!-- Academic Info Section -->
                            <div class="col-span-2 mt-6">
                                <h3 class="text-lg font-medium text-gray-800 mb-4">Informasi Akademik</h3>
                            </div>

                            <!-- Sekolah Asal -->
                            <div>
                                <label for="sekolah_asal" class="block text-sm font-medium text-gray-700 mb-1">Sekolah Asal <span class="text-red-600">*</span></label>
                                <input type="text" id="sekolah_asal" name="sekolah_asal" value="{{ old('sekolah_asal', Auth::guard('siswa')->user()->sekolah_asal) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-600">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email', Auth::guard('siswa')->user()->email) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Account Settings Section -->
                            <div class="col-span-2 mt-6">
                                <h3 class="text-lg font-medium text-gray-800 mb-4">Pengaturan Akun</h3>
                                <p class="text-sm text-gray-600 mb-4">Kosongkan kolom password jika Anda tidak ingin mengubahnya</p>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                                <input type="password" id="password" name="password" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                                <p class="text-xs text-gray-500 mt-1">Minimal 8 karakter</p>
                            </div>

                            <!-- Password Confirmation -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- Submit Buttons -->
                            <div class="md:col-span-2 mt-8 flex flex-col md:flex-row justify-end space-y-4 md:space-y-0 md:space-x-4">
                                <a href="{{ route('siswa.dashboard') }}" class="w-full md:w-auto px-6 py-3 bg-gray-100 hover:bg-gray-200 rounded-md text-gray-700 font-medium text-center transition-colors duration-150 ease-in-out">
                                    Batal
                                </a>
                                <button type="submit" class="w-full md:w-auto px-6 py-3 bg-primary-600 hover:bg-primary-700 rounded-md text-white font-medium transition-colors duration-150 ease-in-out">
                                    Simpan Perubahan
                                </button>
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
                const defaultImage = document.getElementById('default-image');
                
                if (defaultImage) {
                    defaultImage.classList.add('hidden');
                }
                
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection