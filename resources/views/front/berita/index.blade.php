@extends('layouts.app')
@section('title', 'Berita - Pondok Pesantren Al Kautsar')
@section('content')
<div class="py-28 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-green-800 mb-2">Berita Terkini</h1>
            <div class="w-24 h-1 bg-green-600 mx-auto mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Dapatkan informasi terbaru seputar kegiatan dan pencapaian di Pondok Pesantren Al Kautsar</p>
        </div>
        
        <!-- Search and Filter Section -->
        <div class="mb-8 flex flex-wrap justify-between items-center" x-data="{ searchQuery: '' }">
            <div class="w-full md:w-1/3 mb-4 md:mb-0">
                <form action="{{ route('berita.index') }}" method="GET" class="w-full mb-4 md:mb-0">
                    <div class="relative">
                        <input 
                            type="text" 
                            name="search"
                            placeholder="Cari berita..." 
                            class="w-full pl-5 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                            value="{{ request('search') }}"
                        >
                        <button type="submit" class="absolute right-2 top-2.5 text-gray-600 hover:text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="w-full md:w-auto flex flex-wrap gap-2">
                <form method="GET" class="flex flex-wrap gap-2">
                    <select name="kategori" onchange="this.form.submit()" class="px-4 py-2 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('kategori') == $category->slug ? 'selected' : '' }}>
                                {{ $category->nama }}
                            </option>
                        @endforeach
                    </select>
                
                    <!-- Filter tambahan jika dibutuhkan (Terbaru, Terpopuler, dll) -->
                    <select name="sort" onchange="this.form.submit()" class="px-4 py-2 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="">Terbaru</option>
                        <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Terpopuler</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                    </select>
                </form>
            </div>
        </div>
        
        <!-- News Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- News Card -->
            @forelse ($beritas as $itemBerita)
            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg">
                <div class="relative">
                    <img src="{{Storage::url($itemBerita->gambar)}}" alt="Wisuda Tahfidz" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4 text-white px-3 py-1 rounded-full text-sm font-medium"
                    style="background-color: {{ $itemBerita->category->warna }}">
                        {{ $itemBerita->category->nama }}
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ $itemBerita->tanggal_publikasi->format('d M Y') }}</span>
                        <span class="mx-2">•</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>{{ $itemBerita->views_count }} dilihat</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">
                        <a href="{{ route('berita.show', $itemBerita->slug) }}" class="hover:text-green-600">{{ $itemBerita->judul }}</a>
                    </h3>
                    <div class="text-gray-600 mb-4 line-clamp-3 prose">
                        {!! $itemBerita->konten !!}
                    </div>
                    <a href="{{ route('berita.show', $itemBerita->slug) }}" class="inline-flex items-center font-medium text-green-600 hover:text-green-700">
                        Baca selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 bg-white border border-gray-200 rounded-lg shadow-md">
                <h4 class="text-xl font-bold text-secondary-800">Tidak ada berita saat ini.</h4>
                <p class="text-gray-600 mt-2">Silakan cek kembali nanti untuk informasi terbaru.</p>
            </div>
            @endforelse
        </div>
        <div class="mt-10">
            {{ $beritas->links() }}
        </div>
    </div>
</div>
@endsection