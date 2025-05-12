@extends('layouts.app')

@section('title', 'Login Santri - Pondok Pesantren')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-primary-50 to-primary-100 flex items-center justify-center py-16 sm:px-6 lg:px-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row max-w-6xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Left Side - Image -->
            <div class="lg:w-1/2 relative hidden lg:block">
                <div class="absolute inset-0 bg-gradient-to-b from-primary-800/60 to-primary-900/90"></div>
                <img src="{{asset('assets/Screenshot 2025-05-01 202511.png')}}" alt="Pondok Pesantren" class="h-full w-full object-cover" />
                <div class="absolute inset-0 flex flex-col items-center justify-center text-white p-12">
                    <div class="mb-6">
                        <svg class="h-20 w-20 text-white/90" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M50 0C22.4 0 0 22.4 0 50s22.4 50 50 50 50-22.4 50-50S77.6 0 50 0zm0 90c-22.1 0-40-17.9-40-40s17.9-40 40-40 40 17.9 40 40-17.9 40-40 40z"/>
                            <path fill="currentColor" d="M50 10c-22.1 0-40 17.9-40 40s17.9 40 40 40 40-17.9 40-40-17.9-40-40-40zm0 70c-16.5 0-30-13.5-30-30s13.5-30 30-30 30 13.5 30 30-13.5 30-30 30z"/>
                            <path fill="currentColor" d="M50 30c-11 0-20 9-20 20s9 20 20 20 20-9 20-20-9-20-20-20zm0 30c-5.5 0-10-4.5-10-10s4.5-10 10-10 10 4.5 10 10-4.5 10-10 10z"/>
                        </svg>
                    </div>
                    <h2 class="font-kufi text-4xl font-bold mb-8 text-center text-white/90">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h2>
                    <div class="space-y-4 text-center">
                        <p class="text-lg font-medium text-white/80">"Mencari ilmu itu wajib atas setiap muslim"</p>
                        <p class="font-kufi text-lg text-white/80">طَلَبُ الْعِلْمِ فَرِيضَةٌ عَلَى كُلِّ مُسْلِمٍ</p>
                    </div>
                    <!-- Islamic architecture silhouette -->
                    <div class="absolute bottom-0 left-0 right-0">
                        <svg class="w-full text-white/10" viewBox="0 0 1080 150" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M0,150 L1080,150 L1080,120 C1080,120 1000,100 960,100 C920,100 900,120 840,120 C780,120 780,100 720,100 C660,100 660,120 600,120 C540,120 540,100 480,100 C420,100 420,120 360,120 C300,120 300,100 240,100 C180,100 180,120 120,120 C60,120 0,100 0,100 L0,150 Z"/>
                            <path fill="currentColor" d="M540,100 L540,20 C540,10 550,0 560,0 C570,0 580,10 580,20 L580,100"/>
                            <circle fill="currentColor" cx="560" cy="0" r="20"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Login Form -->
            <div class="lg:w-1/2 p-8">
                <div class="max-w-md mx-auto">
                    <!-- Mobile header - only visible on small screens -->
                    <div class="lg:hidden text-center mb-8">
                        <div class="inline-block mb-4">
                            <svg class="h-16 w-16 text-primary-600" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M50 0C22.4 0 0 22.4 0 50s22.4 50 50 50 50-22.4 50-50S77.6 0 50 0zm0 90c-22.1 0-40-17.9-40-40s17.9-40 40-40 40 17.9 40 40-17.9 40-40 40z"/>
                                <path fill="currentColor" d="M50 10c-22.1 0-40 17.9-40 40s17.9 40 40 40 40-17.9 40-40-17.9-40-40-40zm0 70c-16.5 0-30-13.5-30-30s13.5-30 30-30 30 13.5 30 30-13.5 30-30 30z"/>
                                <path fill="currentColor" d="M50 30c-11 0-20 9-20 20s9 20 20 20 20-9 20-20-9-20-20-20zm0 30c-5.5 0-10-4.5-10-10s4.5-10 10-10 10 4.5 10 10-4.5 10-10 10z"/>
                            </svg>
                        </div>
                        <h2 class="font-kufi text-2xl text-secondary-800">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</h2>
                        <p class="mt-1 text-sm text-secondary-600">Dengan nama Allah Yang Maha Pengasih lagi Maha Penyayang</p>
                    </div>

                    <div class="text-center mb-8">
                        <h1 class="text-2xl font-bold text-secondary-800">Login Santri</h1>
                        <p class="mt-2 text-sm text-secondary-600">Masukkan email dan password untuk melanjutkan</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6">
                            <div class="bg-red-50 border border-red-200 text-red-800 rounded-md p-4">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('siswa.login.proses') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-secondary-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-secondary-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="pl-10 block w-full rounded-md border-0 py-2 text-secondary-900 shadow-sm ring-1 ring-inset ring-secondary-300 placeholder:text-secondary-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block text-sm font-medium text-secondary-700 mb-1">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-secondary-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" name="password" type="password" required class="pl-10 block w-full rounded-md border-0 py-2 text-secondary-900 shadow-sm ring-1 ring-inset ring-secondary-300 placeholder:text-secondary-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm">
                            </div>
                        </div>

                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-150 ease-in-out">
                            Masuk
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-secondary-700">
                            Belum terdaftar? <a href="{{ route('siswa.pendaftaran') }}" class="font-medium text-primary-600 hover:text-primary-500">Daftar sebagai santri baru</a>
                        </p>
                    </div>

                    <div class="mt-8 pt-6 border-t border-secondary-200">
                        <p class="text-xs text-center text-secondary-500">
                            "Barangsiapa yang menempuh jalan untuk mencari ilmu, maka Allah akan memudahkan baginya jalan menuju surga"
                        </p>
                        <p class="text-xs text-center text-secondary-500 mt-1 font-kufi">
                            مَنْ سَلَكَ طَرِيقاً يَلْتَمِسُ فِيهِ عِلْماً سَهَّلَ اللَّهُ لَهُ طَرِيقاً إِلَى الْجَنَّةِ
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection