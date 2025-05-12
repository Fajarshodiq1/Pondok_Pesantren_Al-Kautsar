@extends('layouts.app')
@section('title', 'Timeline Pendaftaran - Pondok Pesantren Al Kautsar')
@section('content')
<section class="bg-primary-50 text-primary-900 font-sans py-16">
    <div x-data="{ activeStep: 1 }" class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-center mb-12 text-primary-700">Alur Pendaftaran Pondok Pesantren</h1>
        
        <div class="relative max-w-4xl mx-auto">
            <!-- Timeline Line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-1 bg-primary-300 h-full top-0"></div>
            
            <!-- Timeline Steps -->
            <div class="space-y-12 relative">
                <!-- Step 1 -->
                <div class="flex items-center w-full" x-data="{ isActive: activeStep >= 1 }">
                    <div :class="isActive ? 'bg-primary-500 text-white' : 'bg-primary-100 text-primary-500'" 
                         class="z-10 flex items-center justify-center rounded-full border-4 border-primary-200 h-16 w-16 mx-auto">
                        <span class="text-2xl font-bold">1</span>
                    </div>
                    <div class="w-1/2 pl-8" :class="activeStep >= 1 ? 'opacity-100' : 'opacity-50'">
                        <h3 class="text-xl font-semibold text-primary-700">Pengisian Formulir</h3>
                        <p class="text-secondary-700">Calon santri mengisi formulir pendaftaran secara online atau offline.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="flex items-center w-full" x-data="{ isActive: activeStep >= 2 }">
                    <div :class="isActive ? 'bg-primary-500 text-white' : 'bg-primary-100 text-primary-500'" 
                         class="z-10 flex items-center justify-center rounded-full border-4 border-primary-200 h-16 w-16 mx-auto">
                        <span class="text-2xl font-bold">2</span>
                    </div>
                    <div class="w-1/2 pl-8" :class="activeStep >= 2 ? 'opacity-100' : 'opacity-50'">
                        <h3 class="text-xl font-semibold text-primary-700">Dokumen Persyaratan</h3>
                        <p class="text-secondary-700">Menyiapkan dan mengumpulkan dokumen persyaratan pendaftaran.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="flex items-center w-full" x-data="{ isActive: activeStep >= 3 }">
                    <div :class="isActive ? 'bg-primary-500 text-white' : 'bg-primary-100 text-primary-500'" 
                         class="z-10 flex items-center justify-center rounded-full border-4 border-primary-200 h-16 w-16 mx-auto">
                        <span class="text-2xl font-bold">3</span>
                    </div>
                    <div class="w-1/2 pl-8" :class="activeStep >= 3 ? 'opacity-100' : 'opacity-50'">
                        <h3 class="text-xl font-semibold text-primary-700">Seleksi Administrasi</h3>
                        <p class="text-secondary-700">Panitia melakukan pengecekan kelengkapan dokumen dan administrasi.</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="flex items-center w-full" x-data="{ isActive: activeStep >= 4 }">
                    <div :class="isActive ? 'bg-primary-500 text-white' : 'bg-primary-100 text-primary-500'" 
                         class="z-10 flex items-center justify-center rounded-full border-4 border-primary-200 h-16 w-16 mx-auto">
                        <span class="text-2xl font-bold">4</span>
                    </div>
                    <div class="w-1/2 pl-8" :class="activeStep >= 4 ? 'opacity-100' : 'opacity-50'">
                        <h3 class="text-xl font-semibold text-primary-700">Tes Masuk</h3>
                        <p class="text-secondary-700">Calon santri mengikuti tes akademik dan wawancara.</p>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="flex items-center w-full" x-data="{ isActive: activeStep >= 5 }">
                    <div :class="isActive ? 'bg-primary-500 text-white' : 'bg-primary-100 text-primary-500'" 
                         class="z-10 flex items-center justify-center rounded-full border-4 border-primary-200 h-16 w-16 mx-auto">
                        <span class="text-2xl font-bold">5</span>
                    </div>
                    <div class="w-1/2 pl-8" :class="activeStep >= 5 ? 'opacity-100' : 'opacity-50'">
                        <h3 class="text-xl font-semibold text-primary-700">Pengumuman Kelulusan</h3>
                        <p class="text-secondary-700">Pengumuman hasil seleksi dan penerimaan santri baru.</p>
                    </div>
                </div>

                <!-- Step 6 -->
                <div class="flex items-center w-full" x-data="{ isActive: activeStep >= 6 }">
                    <div :class="isActive ? 'bg-primary-500 text-white' : 'bg-primary-100 text-primary-500'" 
                         class="z-10 flex items-center justify-center rounded-full border-4 border-primary-200 h-16 w-16 mx-auto">
                        <span class="text-2xl font-bold">6</span>
                    </div>
                    <div class="w-1/2 pl-8" :class="activeStep >= 6 ? 'opacity-100' : 'opacity-50'">
                        <h3 class="text-xl font-semibold text-primary-700">Daftar Ulang</h3>
                        <p class="text-secondary-700">Proses konfirmasi dan pembayaran biaya pendaftaran.</p>
                    </div>
                </div>
                <!-- Step 6 -->
                <div class="flex items-center w-full" x-data="{ isActive: activeStep >= 7 }">
                    <div :class="isActive ? 'bg-primary-500 text-white' : 'bg-primary-100 text-primary-500'" 
                         class="z-10 flex items-center justify-center rounded-full border-4 border-primary-200 h-16 w-16 mx-auto">
                        <span class="text-2xl font-bold">6</span>
                    </div>
                    <div class="w-1/2 pl-8" :class="activeStep >= 6 ? 'opacity-100' : 'opacity-50'">
                        <h3 class="text-xl font-semibold text-primary-700">Daftar Ulang</h3>
                        <p class="text-secondary-700">Proses konfirmasi dan pembayaran biaya pendaftaran.</p>
                    </div>
                </div>
            </div>

            <!-- Controls Section -->
            <div class="mt-12 flex justify-center space-x-4">
                <button 
                    @click="activeStep = Math.max(1, activeStep - 1)" 
                    :disabled="activeStep === 1"
                    class="bg-secondary-500 text-white px-6 py-2 rounded-lg disabled:opacity-50 hover:bg-secondary-600 transition duration-300">
                    Sebelumnya
                </button>
                <button 
                    @click="activeStep = Math.min(6, activeStep + 1)" 
                    :disabled="activeStep === 6"
                    class="bg-accent-500 text-white px-6 py-2 rounded-lg disabled:opacity-50 hover:bg-accent-600 transition duration-300">
                    Selanjutnya
                </button>
            </div>
        </div>
    </div>
</section>
@endsection