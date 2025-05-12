@extends('layouts.app')
@section('title', 'Kontak - Pondok Pesantren Al Kautsar')
@section('content')
<section class="bg-primary-50 min-h-screen py-16">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-7xl mx-auto">
            <!-- Page Title -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-primary-800 mb-4">Hubungi Kami</h1>
                <p class="text-primary-600 max-w-2xl mx-auto">
                    Kami senang mendengar dari Anda. Silakan hubungi kami melalui informasi kontak di bawah ini.
                </p>
            </div>

            <!-- Contact Information Grid -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Contact Details -->
                <div class="bg-white shadow-lg rounded-xl p-8 border border-primary-100">
                    <h2 class="text-2xl font-semibold text-primary-700 mb-6">Informasi Kontak</h2>
                    
                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-accent-500 flex-shrink-0 w-6 h-6 mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 0-8 0s-8 6-8 0a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-primary-700">Alamat</h3>
                                <p class="text-secondary-700">
                                    Jalan Pondok Pesantren No. 123
                                    <br>
                                    Desa Sejahtera, Kecamatan Maju
                                    <br>
                                    Kabupaten Berkembang
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-accent-500 flex-shrink-0 w-6 h-6 mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-primary-700">Telepon</h3>
                                <p class="text-secondary-700">(0123) 456-7890</p>
                                <p class="text-secondary-700">(0123) 456-7891</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-accent-500 flex-shrink-0 w-6 h-6 mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-primary-700">Email</h3>
                                <p class="text-secondary-700">info@pondokpesantren.com</p>
                                <p class="text-secondary-700">kontak@pondokpesantren.com</p>
                            </div>
                        </div>

                        <!-- Operating Hours -->
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-accent-500 flex-shrink-0 w-6 h-6 mt-1" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-primary-700">Jam Operasional</h3>
                                <p class="text-secondary-700">Senin - Jumat: 08.00 - 16.00 WIB</p>
                                <p class="text-secondary-700">Sabtu: 08.00 - 12.00 WIB</p>
                                <p class="text-secondary-700">Minggu: Tutup</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Placeholder -->
                <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                    <div class="w-full h-full bg-primary-100 flex items-center justify-center">
                        <div class="text-center p-8">
                            <h3 class="text-2xl font-semibold text-primary-700 mb-4">Lokasi Kami</h3>
                            <img 
                                src="https://via.placeholder.com/600x400" 
                                alt="Lokasi Peta" 
                                class="w-full h-96 object-cover rounded-lg shadow-md"
                            >
                            <p class="mt-4 text-secondary-600">
                                Klik untuk melihat Peta Lokasi Lengkap
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection