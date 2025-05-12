@extends('layouts.app')
@section('title', 'Berita - Pondok Pesantren Al Kautsar')
@section('content')
<section class="py-28 bg-white relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute left-0 bottom-0 w-72 h-72 bg-accent-100 rounded-full -ml-36 -mb-36 opacity-30"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-12">
            <h2 class="font-kufi text-primary-600 text-lg font-semibold">المعرض</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-secondary-800 mt-2">Galeri Kegiatan</h3>
            <div class="w-24 h-1 bg-accent-500 mx-auto mt-4"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Momen berharga dan kegiatan-kegiatan santri dalam keseharian di Pondok Pesantren Al-Kautsar.</p>
        </div>
        
        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center space-x-2 mb-8" x-data="{ activeFilter: '{{$categories->first()->slug ?? 'default'}}' }">
            @forelse ($categories as $category)
                <button @click="activeFilter = '{{ $category->slug }}'" :class="{ 'bg-primary-600 text-white': activeFilter === '{{ $category->slug }}', 'bg-white text-gray-600 hover:bg-gray-100': activeFilter !== '{{ $category->slug }}' }" class="px-4 py-2 rounded-md text-sm font-medium transition duration-300 mb-2">
                    {{ $category->name }}
                </button>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 bg-white border border-gray-200 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-secondary-800">Tidak ada kategori galeri saat ini.</h4>
                    <p class="text-gray-600 mt-2">Silakan cek kembali nanti untuk informasi terbaru.</p>
                </div>
            @endforelse
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Gallery Item 1 -->
            @forelse ($galleries as $itemGallery)
                <div class="relative group overflow-hidden rounded-lg shadow-md" x-show="activeFilter === 'all' || activeFilter === '{{$itemGallery->category->slug}}'">
                    <img src="{{Storage::url($itemGallery->image)}}" alt="{{$itemGallery->title}}" class="w-full h-64 object-cover transition duration-500 group-hover:scale-110"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-70 transition duration-300"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <a href="{{Storage::url($itemGallery->image)}}" class="bg-white p-2 rounded-full mx-1 hover:bg-primary-50" data-fancybox="gallery">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                            </svg>
                        </a>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 text-white transform translate-y-full group-hover:translate-y-0 transition duration-300">
                        <h4 class="text-sm font-semibold">{{$itemGallery->title}}</h4>
                        <div class="text-xs text-gray-200 prose">{!!$itemGallery->description!!}</div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 bg-white border border-gray-200 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-secondary-800">Tidak ada galeri saat ini.</h4>
                    <p class="text-gray-600 mt-2">Silakan cek kembali nanti untuk informasi terbaru.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection