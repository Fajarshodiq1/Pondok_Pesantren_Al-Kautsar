@extends('layouts.app')
@section('title', 'Program Unggulan - Pondok Pesantren Al Kautsar')
@section('content')
    <!-- Programs Section -->
    <section class="py-28 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute right-0 top-0 w-64 h-64 bg-primary-100 rounded-full -mr-32 -mt-32 opacity-50"></div>
        <div class="absolute left-0 bottom-0 w-64 h-64 bg-accent-100 rounded-full -ml-32 -mb-32 opacity-50"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-12">
                <h2 class="font-kufi text-primary-600 text-lg font-semibold">البرامج</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-secondary-800 mt-2">Program Unggulan</h3>
                <div class="w-24 h-1 bg-accent-500 mx-auto mt-4"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Berikut adalah program-program unggulan yang kami tawarkan untuk membentuk generasi yang berakhlak mulia, berilmu tinggi, dan bermanfaat bagi ummah.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- program unggulan --}}
                @forelse ($programs as $itemProgram)
                <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="relative h-48 bg-primary-100">
                        <img src="{{Storage::url($itemProgram->thumbnail)}}" alt="Program Tahfidz Al-Qur'an" class="w-full h-full object-cover"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900 to-transparent opacity-60"></div>
                        <div class="absolute bottom-0 left-0 p-4">
                            <h4 class="text-white text-xl font-bold">{{$itemProgram->name}}</h4>
                        </div>
                        <div class="absolute top-4 right-4 bg-primary-500 text-white text-xs font-bold px-3 py-1 rounded-full">UNGGULAN</div>
                    </div>
                    <div class="p-5">
                        <div class="text-gray-600 mb-4 prose line-clamp-2">
                            {!! $itemProgram->description !!}
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Program 5 Tahun</span>
                            </div>
                            <a href="{{route('program.show', $itemProgram->slug)}}" class="text-primary-600 hover:text-primary-700 font-medium">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 bg-white border border-gray-200 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-secondary-800">Tidak ada program unggulan saat ini.</h4>
                    <p class="text-gray-600 mt-2">Silakan cek kembali nanti untuk informasi terbaru.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection