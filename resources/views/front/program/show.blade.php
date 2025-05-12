@extends('layouts.app')
@section('title', 'Detail Program - Pondok Pesantren')
@section('content')
<section class="bg-primary-50">
    <!-- Breadcrumb -->
    <div class="container max-w-7xl mx-auto px-4 py-2 text-sm pt-20">
        <div class="flex items-center text-gray-600">
            <a href="#" class="hover:text-primary-600">Beranda</a>
            <span class="mx-2">/</span>
            <a href="#" class="hover:text-primary-600">Program</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 font-medium">{{$program->name}}</span>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container max-w-7xl mx-auto px-4 py-6 ">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Program Header -->
            <div class="relative">
                <img src="{{Storage::url($program->thumbnail)}}" alt="Program Cover Image" class="w-full h-full md:h-[600px] object-center object-cover">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6">
                    <h1 class="text-white text-2xl md:text-4xl font-bold">{{$program->name}}</h1>
                    <div class="flex items-center mt-2">
                        <span class="ml-3 text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            15 Juni - 15 Juli 2025
                        </span>
                    </div>
                </div>
            </div>

            <!-- Program Content -->
            <div class="p-6">
                <div class="flex flex-wrap -mx-4">
                    <!-- Left Content -->
                    <div class="w-full lg:w-2/3 px-4">
                        <div class="mb-8">
                            <h2 class="text-xl font-bold mb-4 text-gray-800">Deskripsi Program</h2>
                            <div class="prose max-w-none text-gray-600">
                            {!! $program->description !!}
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="w-full lg:w-1/3 px-4">
                        <div class="sticky top-6">
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden mb-6">
                                <div class="p-5">
                                    <div class="flex justify-between items-center mb-4">
                                        <span class="text-lg font-bold text-gray-800">Biaya Pendaftaran</span>
                                        <span class="text-green-600 font-bold">Diskon 20%</span>
                                    </div>
                                    <div class="mb-4">
                                        <span class="line-through text-gray-500">Rp1.000.000</span>
                                        <div class="text-2xl font-bold text-gray-900">Rp850.000/bulan</div>
                                    </div>
                                    <a href="{{route('siswa.pendaftaran')}}" class="w-full inline-block bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300">
                                        Daftar Sekarang
                                    </a>
                                </div>
                                <div class="bg-gray-50 px-5 py-3 border-t border-gray-200">
                                    <div class="flex items-center text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm">Ijazah Kelulusan Pondok</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-primary-50 border border-primary-100 rounded-lg p-5">
                                <h3 class="font-bold text-primary-800 mb-3">Butuh Informasi Lebih?</h3>
                                <p class="text-primary-700 text-sm mb-4">Hubungi tim kami untuk konsultasi dan bantuan pendaftaran.</p>
                                <a href="https://wa.me/6282112757521?text=Assalamualaikum%2C%20saya%20ingin%20bertanya%20tentang%20program%20{{ urlencode($program->name) }}" 
                                    target="_blank"
                                    class="flex items-center justify-center bg-white text-primary-600 border border-primary-300 hover:bg-primary-50 font-medium py-2 px-4 rounded-lg transition duration-300">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                     </svg>
                                     Chat dengan Tim Kami
                                 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Programs -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Program Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($relatedPrograms as $related)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="{{ Storage::url($related->thumbnail) }}" alt="Program Image" class="w-full h-48 object-cover">
                        <div class="p-5">
                            <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $related->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($related->description), 100) }}</p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('program.detail', $related->slug) }}" class="text-primary-600 hover:text-primary-800 font-medium">Detail →</a>
                            </div>
                        </div>
                    </div>

                @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 bg-white border border-gray-200 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-secondary-800">Tidak ada program terkait saat ini.</h4>
                    <p class="text-gray-600 mt-2">Silakan cek kembali nanti untuk informasi terbaru.</p>
                </div>
                @endforelse
            </div>
            </div>
        </div>
    </main>
</section>

@endsection