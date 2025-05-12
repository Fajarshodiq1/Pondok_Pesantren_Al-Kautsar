@extends('layouts.app')

@section('title', $berita->judul)

@section('meta')
<meta name="description" content="{{ Str::limit(strip_tags($berita->konten), 160) }}">
<meta property="og:title" content="{{ $berita->judul }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($berita->konten), 160) }}">
<meta property="og:image" content="{{ asset('storage/' . $berita->gambar) }}">
<meta property="og:url" content="{{ route('berita.show', $berita->slug) }}">
<meta property="og:type" content="article">
<meta property="article:published_time" content="{{ $berita->tanggal_publikasi->toIso8601String() }}">
<meta property="article:section" content="{{ $berita->category->nama }}">
@endsection

@section('content')
<!-- Breadcrumbs -->
<div class="bg-primary-50 py-3">
    <div class="container mx-auto px-4">
        <div class="flex items-center text-sm text-primary-600">
            <a href="{{ route('index') }}" class="hover:text-green-700">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('berita.index') }}" class="hover:text-green-700">Berita</a>
            <span class="mx-2">/</span>
            <a href="{{ route('berita.index', ['category' => $berita->category->slug]) }}" class="hover:text-green-700">{{ $berita->category->nama }}</a>
            <span class="mx-2">/</span>
            <span class="text-primary-800 font-medium truncate">{{ $berita->judul }}</span>
        </div>
    </div>
</div>

<!-- Article Header -->
<div class="bg-white py-6">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <span class="bg-[{{ $berita->category->warna }}] text-white text-xs px-3 py-1 rounded-full uppercase tracking-wider">
                {{ $berita->category->nama }}
            </span>
            <h1 class="text-3xl md:text-4xl font-bold mt-3 mb-4 text-primary-800">{{ $berita->judul }}</h1>
            
            <div class="flex flex-wrap items-center text-primary-600 text-sm mb-6">
                <span class="mr-4">
                    <i class="far fa-calendar mr-1"></i> {{ $berita->tanggal_publikasi->format('d M Y, H:i') }}
                </span>
                <span class="mr-4">
                    <i class="far fa-eye mr-1"></i> {{ $berita->views_count }} dilihat
                </span>
                <span>
                    <i class="far fa-folder mr-1"></i> {{ $berita->category->nama }}
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Featured Image -->
<div class="w-full py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="aspect-video rounded-lg overflow-hidden shadow-xl">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</div>

<!-- Article Content -->
<main class="container max-w-7xl mx-auto px-4 py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="w-full lg:w-8/12">
            <article class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Content -->
                <div class="p-6 md:p-8">
                    <div class="prose prose-green max-w-none">
                        {!! $berita->konten !!}
                    </div>
                </div>
                
                <!-- Share Buttons -->
                <div class="border-t border-primary-100 p-6 bg-primary-50">
                    <div class="flex flex-wrap items-center justify-between">
                        <div class="text-primary-600 text-sm mb-3 md:mb-0">Bagikan artikel ini:</div>
                        <div class="flex space-x-2">
                            <button
                                onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('berita.show', $berita->slug)) }}', '_blank')"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-md transition">
                                <i class="ri-facebook-fill"></i>
                            </button>
                            <button
                                onclick="window.open('https://twitter.com/intent/tweet?url={{ urlencode(route('berita.show', $berita->slug)) }}&text={{ urlencode($berita->judul) }}', '_blank')"
                                class="bg-sky-500 hover:bg-sky-600 text-white px-3 py-2 rounded-md transition">
                                <i class="ri-twitter-x-fill"></i>
                            </button>
                            <button
                                onclick="window.open('https://wa.me/?text={{ urlencode($berita->judul . ' ' . route('berita.show', $berita->slug)) }}', '_blank')"
                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-md transition">
                                <i class="ri-whatsapp-fill"></i>
                            </button>
                            <button
                            x-data
                            @click="navigator.clipboard.writeText('{{ route('berita.show', $berita->slug) }}'); alert('Link berhasil disalin!')"
                            class="bg-primary-600 hover:bg-primary-700 text-white px-3 py-2 rounded-md transition"
                            title="Salin Link">
                            <i class="ri-link"></i>
                        </button>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Related News -->
            <div class="mt-10">
                <h3 class="text-xl font-bold mb-6 text-primary-800">Berita Terkait</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($relatedBerita as $related)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform hover:shadow-lg hover:-translate-y-1">
                        <a href="{{ route('berita.show', $related->slug) }}" class="block">
                            <img src="{{ asset('storage/' . $related->gambar) }}" alt="{{ $related->judul }}" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-5">
                            <div class="flex items-center mb-3">
                                <span class="bg-[{{ $related->category->warna }}] text-white text-xs px-2 py-1 rounded-full uppercase tracking-wider">{{ $related->category->nama }}</span>
                                <span class="text-primary-500 text-sm ml-auto">{{ $related->tanggal_publikasi->format('d M Y') }}</span>
                            </div>
                            <a href="{{ route('berita.show', $related->slug) }}" class="block">
                                <h3 class="font-bold text-lg mb-2 hover:text-green-700 transition">{{ $related->judul }}</h3>
                            </a>
                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('berita.show', $related->slug) }}" class="text-green-700 inline-flex items-center font-medium hover:underline">
                                    Baca selengkapnya
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <div class="text-primary-500 text-sm">
                                    <i class="far fa-eye mr-1"></i> {{ $related->views_count }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="w-full lg:w-4/12 space-y-8">
            <!-- Search -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Cari Berita</h3>
                <form action="{{ route('berita.index') }}" method="GET" class="flex">
                    <input type="text" name="search" placeholder="Cari berita..." class="w-full rounded-l-lg border-primary-300 focus:border-green-500 focus:ring focus:ring-green-200 transition">
                    <button type="submit" class="bg-green-700 text-white px-4 rounded-r-lg hover:bg-green-800 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Kategori -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Kategori</h3>
                <ul class="space-y-2">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('berita.index', ['category' => $category->slug]) }}" 
                           class="flex items-center justify-between py-2 px-3 rounded hover:bg-primary-100 transition 
                                  {{ $berita->category->id === $category->id ? 'bg-primary-100 font-medium' : '' }}">
                            <span class="flex items-center">
                                <span class="w-3 h-3 rounded-full mr-2" style="background-color: {{ $category->warna }}"></span>
                                {{ $category->nama }}
                            </span>
                            <span class="bg-primary-100 text-primary-600 text-xs font-medium px-2 py-1 rounded-full">
                                {{ $category->berita_count }}
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Berita Populer -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Berita Populer</h3>
                <div class="space-y-4">
                    @foreach($popularBerita as $popular)
                    <div class="flex space-x-3">
                        <a href="{{ route('berita.show', $popular->slug) }}" class="shrink-0">
                            <img src="{{ asset('storage/' . $popular->gambar) }}" alt="{{ $popular->judul }}" class="w-20 h-20 object-cover rounded">
                        </a>
                        <div>
                            <span class="text-xs bg-[{{ $popular->category->warna }}] text-white px-2 py-0.5 rounded-full">{{ $popular->category->nama }}</span>
                            <a href="{{ route('berita.show', $popular->slug) }}" class="block">
                                <h4 class="font-medium text-sm leading-tight mt-1 hover:text-green-700 transition">{{ $popular->judul }}</h4>
                            </a>
                            <div class="text-primary-500 text-xs mt-1">
                                <span>{{ $popular->tanggal_publikasi->format('d M Y') }}</span>
                                <span class="ml-2"><i class="far fa-eye"></i> {{ $popular->views_count }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- CTA -->
            <div class="bg-green-700 p-6 rounded-lg shadow-md text-white">
                <h3 class="text-lg font-semibold mb-2">Gabung dengan Pondok Pesantren</h3>
                <p class="mb-4 text-green-100">Perkuat ilmu agama dan keterampilan hidup Anda bersama kami</p>
                <a href="{{ route('siswa.pendaftaran') }}" class="block text-center bg-white text-green-700 font-medium py-2 px-4 rounded-lg hover:bg-green-50 transition">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</main>
@endsection