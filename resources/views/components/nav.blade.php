 <!-- Navbar -->
 <nav class="bg-white shadow-md fixed w-full z-50" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-primary-600 font-kufi text-2xl font-bold">الكوثر</span>
                    <span class="ml-2 text-secondary-700 font-semibold">Pondok Pesantren</span>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                @if (Auth::guard('siswa')->check())
                    <a href="{{route('siswa.dashboard')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                    <a href="{{route('pembayaran')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Pembayaran</a>
                    <a href="{{route('berita.index')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Informasi</a>
                    <a href="{{route('timeline')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Alur Pendaftaran</a>
                    <form action="{{ route('siswa.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-primary-500 py-2 px-5 rounded-lg text-white font-semibold">Logout</button>
                    </form>
                @else
                    <a href="/" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                    <a href="{{route('profile')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Profil</a>
                    <a href="{{route('program.index')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Program</a>
                    <a href="{{route('berita.index')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Berita</a>
                    <a href="{{route('gallery.index')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Galeri</a>
                    <a href="{{route('timeline')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Alur Pendaftaran</a>
                    <a href="{{route('kontak')}}" class="text-secondary-700 hover:text-primary-500 px-3 py-2 rounded-md text-sm font-medium">Kontak</a>
                    <a href="{{route('siswa.pendaftaran')}}" class="bg-primary-500 text-white hover:bg-primary-600 px-4 py-2 rounded-md text-sm font-medium transition duration-300">Pendaftaran</a>
                    <a href="{{route('siswa.login')}}" class="bg-primary-500 text-white hover:bg-primary-600 px-4 py-2 rounded-md text-sm font-medium transition duration-300">Login</a>
                @endif
            </div>
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-gray-500 hover:text-secondary-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div x-show="open" class="md:hidden bg-white shadow-lg">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{route('index')}}" class="text-secondary-700 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
            <a href="{{route('profile')}}" class="text-secondary-700 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Profil</a>
            <a href="{{route('program.index')}}" class="text-secondary-700 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Program</a>
            <a href="{{route('berita.index')}}" class="text-secondary-700 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Berita</a>
            <a href="{{route('gallery.index')}}" class="text-secondary-700 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Galeri</a>
            <a href="{{route('kontak')}}" class="text-secondary-700 hover:text-primary-500 block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
            <a href="{{route('siswa.pendaftaran')}}" class="bg-primary-500 text-white hover:bg-primary-600 block px-3 py-2 rounded-md text-base font-medium mt-4 transition duration-300">Pendaftaran</a>
            <a href="{{route('siswa.login')}}" class="bg-primary-500 text-white hover:bg-primary-600 block px-3 py-2 rounded-md text-base font-medium mt-4 transition duration-300">Login</a>
        </div>
        </div>
    </div>
</nav>