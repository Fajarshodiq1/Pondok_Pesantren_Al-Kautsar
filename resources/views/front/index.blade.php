@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <div class="relative pt-16 overflow-hidden">
        <!-- Decorative Islamic Pattern Top -->
        <div class="absolute top-0 left-0 w-full h-16 bg-primary-500 opacity-10" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NiIgaGVpZ2h0PSIxMDAiPgo8cmVjdCB3aWR0aD0iNTYiIGhlaWdodD0iMTAwIiBmaWxsPSIjMkE4NDg2Ij48L3JlY3Q+CjxwYXRoIGQ9Ik0yOCA2NkwwIDUwTDAgMTZMMjggMEw1NiAxNkw1NiA1MEwyOCA2NkwyOCAxMDBMNTYgMTAwTDU2IDAgTDI4IDBMMjggNjZaIiBmaWxsPSJub25lIiBzdHJva2U9IiNGRkZGRkYiIHN0cm9rZS13aWR0aD0iMiI+PC9wYXRoPgo8cGF0aCBkPSJNMjggMEwyOCA2Nkw1NiA1MEw1NiAxNkwyOCAwWiIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjRkZGRkZGIiBzdHJva2Utd2lkdGg9IjIiPjwvcGF0aD4KPC9zdmc+'); background-repeat: repeat-x;"></div>

        <div class="min-h-screen flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="text-center md:text-left" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 500)">
                        <div x-show="shown" 
                             x-transition:enter="transition ease-out duration-1000"
                             x-transition:enter-start="opacity-0 transform -translate-y-8"
                             x-transition:enter-end="opacity-100 transform translate-y-0">
                            <h1 class="font-kufi text-3xl md:text-5xl font-bold text-primary-800 mb-2">
                                <span class="text-accent-600">مرحبا بكم في</span>
                            </h1>
                            <h2 class="text-4xl md:text-6xl font-bold text-secondary-800 mb-6">Pondok Pesantren <span class="text-primary-600">Al-Kautsar</span></h2>
                            <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-lg">Membentuk generasi yang berakhlak mulia, berilmu tinggi, dan bermanfaat bagi ummah dengan pendidikan Islam terpadu yang berkualitas.</p>
                            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 justify-center md:justify-start">
                                <a href="#" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-md font-medium text-lg transition duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                                    <span>Pelajari Lebih Lanjut</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" class="border-2 border-accent-500 hover:bg-accent-50 text-accent-700 px-6 py-3 rounded-md font-medium text-lg transition duration-300 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v8a2 2 0 01-2 2h-2a2 2 0 01-2-2V6z" />
                                    </svg>
                                    <span>Tonton Video</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="relative" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 1000)">
                        <div x-show="shown"
                             x-transition:enter="transition ease-out duration-1000"
                             x-transition:enter-start="opacity-0 transform translate-x-8"
                             x-transition:enter-end="opacity-100 transform translate-x-0">
                            <!-- Islamic Geometric Pattern Frame -->
                            <div class="absolute inset-0 border-4 border-primary-200 rounded-lg transform -rotate-2 scale-105"></div>
                            <div class="absolute inset-0 border-4 border-accent-200 rounded-lg transform rotate-2 scale-105"></div>
                            
                            <!-- Image -->
                            <div class="relative overflow-hidden rounded-lg shadow-xl">
                                <div class="absolute inset-0 bg-primary-900 opacity-10 mix-blend-multiply"></div>
                                <img src="{{asset('assets/Screenshot 2025-05-01 202511.png')}}" alt="Pondok Pesantren Al-Iman" class="w-full h-auto object-cover"/>
                                
                                <!-- Islamic Decorative Element -->
                                <div class="absolute top-0 right-0 w-24 h-24 bg-accent-500 opacity-90 rounded-bl-3xl flex items-center justify-center">
                                    <div class="text-white font-kufi text-xl transform -rotate-45">العلم</div>
                                </div>
                            </div>
                            
                            <!-- Floating Info Box -->
                            <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-lg shadow-lg max-w-xs">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-primary-100 p-2 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-primary-600 font-semibold">DIDIRIKAN SEJAK</div>
                                        <div class="text-secondary-800 font-bold">2008</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Floating Stats Box -->
                            <div class="absolute -bottom-6 right-6 bg-primary-600 p-4 rounded-lg shadow-lg">
                                <div class="text-white">
                                    <div class="text-xs font-semibold">SANTRI AKTIF</div>
                                    <div class="text-2xl font-bold">1000+</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Decorative Islamic Pattern Bottom -->
        <div class="absolute bottom-0 left-0 w-full h-16 bg-accent-500 opacity-10" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NiIgaGVpZ2h0PSIxMDAiPgo8cmVjdCB3aWR0aD0iNTYiIGhlaWdodD0iMTAwIiBmaWxsPSIjRDI4RjMzIj48L3JlY3Q+CjxwYXRoIGQ9Ik0yOCA2NkwwIDUwTDAgMTZMMjggMEw1NiAxNkw1NiA1MEwyOCA2NkwyOCAxMDBMNTYgMTAwTDU2IDAgTDI4IDBMMjggNjZaIiBmaWxsPSJub25lIiBzdHJva2U9IiNGRkZGRkYiIHN0cm9rZS13aWR0aD0iMiI+PC9wYXRoPgo8cGF0aCBkPSJNMjggMEwyOCA2Nkw1NiA1MEw1NiAxNkwyOCAwWiIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjRkZGRkZGIiBzdHJva2Utd2lkdGg9IjIiPjwvcGF0aD4KPC9zdmc+'); background-repeat: repeat-x;"></div>
    </div>
     <!-- Programs Section -->
    <section class="py-16 bg-white relative overflow-hidden">
        <!-- Decorative Element -->
        <div class="absolute right-0 top-0 w-64 h-64 bg-primary-100 rounded-full -mr-32 -mt-32 opacity-50"></div>
        <div class="absolute left-0 bottom-0 w-64 h-64 bg-accent-100 rounded-full -ml-32 -mb-32 opacity-50"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-12">
                <h2 class="font-kufi text-primary-600 text-lg font-semibold">البرامج</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-secondary-800 mt-2">Program Unggulan</h3>
                <div class="w-24 h-1 bg-accent-500 mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Tahfidz Program -->
                @forelse ($programs as $program)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                        <div class="relative h-48 bg-primary-100">
                            <img src="{{Storage::url($program->thumbnail)}}" alt="Program Tahfidz" class="w-full h-full object-cover"/>
                            <div class="absolute inset-0 bg-gradient-to-t from-primary-900 to-transparent opacity-60"></div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <h4 class="text-white text-xl font-bold">{{$program->name}}</h4>
                            </div>
                            <div class="absolute top-4 right-4 bg-primary-500 text-white text-xs font-bold px-3 py-1 rounded-full">UNGGULAN</div>
                        </div>
                        <div class="p-5">
                            <div class="text-gray-600 mb-4 prose line-clamp-2">{!!$program->description!!}</div>
                            <div class="flex justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $program->created_at->diffForHumans() }}</span>
                                </div>
                                <a href="{{route('program.show', $program->slug)}}" class="text-indigo-500">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>data kosong</p>
                @endforelse
            </div>

            <div class="text-center mt-10">
                <a href="{{route('program.index')}}" class="inline-flex items-center px-6 py-3 border border-primary-600 text-primary-600 bg-white hover:bg-primary-50 rounded-md transition duration-300 font-medium">
                    <span>Lihat Semua Program</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Facilities Section -->
    <section class="py-16 bg-gray-50" x-data="{ activeTab: '{{ $facilityCategories->first()->slug ?? 'default' }}' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-kufi text-primary-600 text-lg font-semibold">المرافق</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-secondary-800 mt-2">Fasilitas Pondok</h3>
                <div class="w-24 h-1 bg-accent-500 mx-auto mt-4"></div>
            </div>
            
            <!-- Tabs -->
            <div class="flex flex-wrap justify-center space-x-1 md:space-x-2 mb-8">
                @forelse ($facilityCategories as $category)
                <button @click="activeTab = '{{ $category->slug }}'" :class="{ 'bg-primary-600 text-white': activeTab === '{{ $category->slug }}', 'bg-white text-gray-600 hover:bg-gray-100': activeTab !== '{{ $category->slug }}' }" class="px-4 py-2 rounded-md text-sm font-medium transition duration-300 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    {{ $category->name }}
                </button>
                @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 bg-white border border-gray-200 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-secondary-800">Tidak ada kategori fasilitas saat ini.</h4>
                    <p class="text-gray-600 mt-2">Silakan cek kembali nanti untuk informasi terbaru.</p>
                </div>
                @endforelse
            </div>
            
            <!-- Tab Contents -->
            @forelse ($facilityCategories as $category)
                <div x-show="activeTab === '{{ $category->slug }}'" class="bg-white rounded-lg shadow-lg overflow-hidden">
                    @forelse ($category->facilities as $facility)
                    <div class="md:flex">
                        <div class="md:w-1/2">
                            <img src="{{Storage::url($facility->image)}}" alt="{{ $facility->title }}" class="w-full h-full object-cover"/>
                        </div>
                        <div class="md:w-1/2 p-6 md:p-8 flex flex-col justify-center">
                            <h4 class="text-2xl font-bold text-secondary-800 mb-4">{{ $facility->title }}</h4>
                            <div class="text-gray-600 mb-4 prose">{!! $facility->description !!}</div>
                            <ul class="space-y-2">
                                @forelse ($facility->features as $feature)
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-primary-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ $feature }}</span>
                                </li>
                                @empty
                                <li class="text-gray-600">Tidak ada fitur yang tercantum.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-10">
                        <h4 class="text-xl font-bold text-secondary-800">Tidak ada fasilitas untuk kategori ini.</h4>
                        <p class="text  -gray-600 mt-2">Silakan cek kategori lain atau kembali nanti.</p>
                    </div>
                    @endforelse
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 bg-white border border-gray-200 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold text-secondary-800">Tidak ada fasilitas saat ini.</h4>
                    <p class="text-gray-600 mt-2">Silakan cek kembali nanti untuk informasi terbaru.</p>
                </div>
            @endforelse
        </div>
    </section>
    <!-- Testimoni Section -->
    <section class="py-16 bg-white relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute left-0 top-0 w-64 h-64 bg-accent-100 rounded-full -ml-32 -mt-32 opacity-50"></div>
        <div class="absolute right-0 bottom-0 w-64 h-64 bg-primary-100 rounded-full -mr-32 -mb-32 opacity-50"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-12">
                <h2 class="font-kufi text-primary-600 text-lg font-semibold">الشهادات</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-secondary-800 mt-2">Testimoni Santri & Alumni</h3>
                <div class="w-24 h-1 bg-accent-500 mx-auto mt-4"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Apa kata mereka yang telah mengalami pendidikan di Pondok Pesantren Al-Kautsar?</p>
            </div>

            <!-- Testimonial Slider -->
            <div class="relative" 
            x-data="{ 
                activeSlide: 1, 
                slides: {{ count($testimonials) }} 
            }"
            x-init="slides = {{ count($testimonials) }}">
            
            <!-- Testimonials -->
            <div class="overflow-hidden py-5">
                <div class="flex transition-transform duration-500 ease-in-out"
                        :style="`transform: translateX(-${(activeSlide-1) * 100}%)`">
                    @forelse ($testimonials as $itemTestimonial)
                    <div class="w-full flex-shrink-0 px-4">
                        <div class="bg-white rounded-xl shadow-lg p-8 md:flex">
                            <div class="md:w-1/3 flex justify-center mb-6 md:mb-0">
                                <div class="relative">
                                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-primary-100">
                                        <img src="{{Storage::url($itemTestimonial->siswa->pas_foto)}}" alt="{{$itemTestimonial->name}}" class="w-full h-full object-cover"/>
                                    </div>
                                    <div class="absolute -bottom-2 -right-2 bg-accent-500 text-white text-xs font-bold px-3 py-1 rounded-full">ALUMNI</div>
                                </div>
                            </div>
                            <div class="md:w-2/3 md:pl-8">
                                <div class="text-accent-500 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                                <p class="text-gray-600 italic mb-4 prose">{!!$itemTestimonial->testimonial!!}</p>
                                <div>
                                    <h4 class="font-bold text-secondary-800 text-lg">{{$itemTestimonial->siswa->nama}}</h4>
                                    <p class="text-primary-600">{{$itemTestimonial->detail_alumni}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-10 bg-white border border-gray-200 rounded-lg shadow-md">
                        <h4 class="text-xl font-bold text-secondary-800">Tidak ada testimoni saat ini.</h4>
                        <p class="text-gray-600 mt-2">Silakan cek kembali nanti untuk informasi terbaru.</p>
                    </div>
                    @endforelse
                </div>
            </div>
    
        <!-- Control Bullets -->
        <div class="flex justify-center mt-8 space-x-2" x-show="slides > 1">
            <template x-for="i in slides" :key="i">
                <button 
                    @click="activeSlide = i" 
                    :class="{ 'bg-primary-600': activeSlide === i, 'bg-primary-200': activeSlide !== i }" 
                    class="w-3 h-3 rounded-full focus:outline-none transition-colors duration-300">
                </button>
            </template>
        </div>
    
        <!-- Navigation Arrows -->
        <template x-if="slides > 1">
            <div>
                <button @click="activeSlide = activeSlide === 1 ? slides : activeSlide - 1"
                    class="absolute top-1/2 left-0 -translate-y-1/2 bg-white p-2 rounded-full shadow-md text-gray-800 hover:bg-primary-50 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="activeSlide = activeSlide === slides ? 1 : activeSlide + 1"
                    class="absolute top-1/2 right-0 -translate-y-1/2 bg-white p-2 rounded-full shadow-md text-gray-800 hover:bg-primary-50 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </template>
    </div>
    
        </div>
    </section>

    <!-- Galeri Kegiatan Section -->
    <section class="py-16 bg-white relative overflow-hidden">
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
            <div class="flex flex-wrap justify-center space-x-2 mb-8" x-data="{ activeFilter: '{{$galleryCategories->first()->slug ?? 'default'}}' }">
                @forelse ($galleryCategories as $category)
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