@extends('layouts.app')
@section('title', 'Profile - Pondok Pesantren')
@section('content')
<!-- Breadcrumb -->
<div class="bg-white pt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex items-center text-sm text-gray-500">
            <a href="#" class="hover:text-primary-800">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-primary-800 font-medium">Profil</span>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Sejarah Section -->
    <section class="mb-16">
        <div class="flex flex-col md:flex-row gap-8 items-center">
            <div class="w-full md:w-1/2">
                <h2 class="text-2xl md:text-3xl font-bold text-primary-800 mb-4">Sejarah Pendirian</h2>
                <div class="prose max-w-none">
                    <p class="mb-4">
                        Pondok Pesantren Tahfidz Al-Qur’an Al-Kautsar didirikan pada tahun 2010 oleh dua orang ustadz, yakni Ustadz Mahmud Abdul Ghani, S.Kom., M.M. dan Ustadz Jamal Haris, S.Ag. Terletak di Jl. Rusa 1 Blok H No. 108 RT 01 RW 09, Kelurahan Serta Jaya, Kecamatan Cikarang Timur, Kabupaten Bekasi, Jawa Barat, pondok ini berdiri sebagai bagian dari upaya membentuk generasi yang Qur’ani dan berakhlak Islami.
                      </p>
                      <p class="mb-4">
                        Meskipun bukan termasuk pondok pesantren besar seperti Gontor atau Tebuireng, Al-Kautsar tetap mampu bertahan dan berkembang di tengah masyarakat modern. Keberhasilan ini tidak lepas dari peran aktif para pengasuh, santri, serta dukungan masyarakat sekitar. Kehidupan pesantren yang terpadu antara pembelajaran dan pembiasaan nilai-nilai Islam menjadi kunci dalam membentuk karakter para santri.
                      </p>
                      <p class="mb-4">
                        Pondok ini juga menjadi salah satu lembaga yang turut berkontribusi dalam menjaga nilai-nilai keislaman di masyarakat, khususnya melalui program tahfidzul Qur’an. Keberadaan Al-Kautsar menunjukkan bahwa pondok pesantren tradisional masih memiliki tempat penting dalam dunia pendidikan Islam, sekaligus menjadi bagian dari pelestarian budaya keislaman Indonesia.
                      </p>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <img src="{{asset('assets/Screenshot 2025-05-01 202511.png')}}" alt="Sejarah Pondok Pesantren Al-Kautsar" class="rounded-lg shadow-lg w-full">
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="mb-16 bg-primary-50 p-8 rounded-lg">
        <h2 class="text-2xl md:text-3xl font-bold text-primary-800 mb-6 text-center">Visi & Misi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold text-primary-800 mb-4 flex items-center">
                    <i class="fas fa-eye mr-3 text-primary-600"></i>Visi
                </h3>
                <p>Menjadi lembaga pendidikan Islam terkemuka yang melahirkan generasi Qur'ani yang beriman kokoh, berakhlak mulia, dan berwawasan luas, serta mampu mengintegrasikan khazanah Islam klasik dengan ilmu pengetahuan modern untuk menjawab tantangan zaman.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold text-primary-800 mb-4 flex items-center">
                    <i class="fas fa-bullseye mr-3 text-primary-600"></i>Misi
                </h3>
                <ul class="list-disc pl-5 space-y-2">
                    <li>Menyelenggarakan pendidikan Islam yang komprehensif, integratif, dan bermutu tinggi.</li>
                    <li>Menanamkan dan menguatkan nilai-nilai akidah, ibadah, dan akhlak sesuai ajaran Islam Ahlussunnah wal Jama'ah.</li>
                    <li>Membekali santri dengan kemampuan bahasa Arab dan Inggris yang memadai.</li>
                    <li>Mengembangkan budaya akademik yang mendorong santri untuk terus belajar dan berinovasi.</li>
                    <li>Menyiapkan santri untuk menjadi pemimpin yang mampu memberikan kontribusi positif bagi masyarakat.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi -->
    <section class="mb-16">
        <h2 class="text-2xl md:text-3xl font-bold text-primary-800 mb-6 text-center">Struktur Organisasi</h2>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex flex-col items-center mb-8">
                <div class="bg-primary-100 p-4 rounded-lg shadow mb-2 w-64 text-center">
                    <h4 class="font-bold text-primary-800">Ketua Yayasan</h4>
                    <p>HJ. Nita Susanti S.Pd.SD</p>
                </div>
                <div class="w-px h-8 bg-primary-800"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                    <h4 class="font-bold text-primary-800">Mudir Pesantren</h4>
                    <p>Ustadz Abdul Wahab Alhafidz</p>
                </div>
                <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                    <h4 class="font-bold text-primary-800">Sekretaris</h4>
                    <p>Ustadz Jamal Haris S.Ag</p>
                </div>
                <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                    <h4 class="font-bold text-primary-800">Bendahara</h4>
                    <p>Haryani Puji Astuti</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                    <h4 class="font-bold text-primary-800">Kepala Madrasah</h4>
                    <p>Ustadzah Aisyah S.Ag.M.Pd</p>
                </div>
                <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                    <h4 class="font-bold text-primary-800">Kepala Pengawas</h4>
                    <p>Ustadz Mahmud Abdul Ghani,S.Kom.MM.</p>
                </div>
                <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                    <h4 class="font-bold text-primary-800">Dewan Pembina 1</h4>
                    <p>KH. Subki Fauzi Abdurahman</p>
                </div>
                <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                    <h4 class="font-bold text-primary-800">Dewan Pembina 2</h4>
                    <p>KH. Syarifudin Jatnika LC</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Prestasi -->
    <section class="mb-16">
        <h2 class="text-2xl md:text-3xl font-bold text-primary-800 mb-6 text-center">Prestasi Membanggakan</h2>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestasi</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tingkat</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Juara 1 Musabaqah Hifdzil Qur'an 30 Juz</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Nasional</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Juara 2 Kompetisi Sains Madrasah</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Provinsi</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Juara 1 Festival Bahasa Arab</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Nasional</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2022</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Juara 1 Lomba Debat Bahasa Inggris</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Provinsi</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2022</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Juara 3 Olimpiade Matematika</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Nasional</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- CTA Pendaftaran -->
    <section class="bg-primary-100 p-8 rounded-lg text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-primary-800 mb-4">Bergabunglah Bersama Kami</h2>
        <p class="text-lg text-primary-700 mb-6 max-w-2xl mx-auto">Pendaftaran santri baru untuk tahun ajaran 2025/2026 telah dibuka. Jadilah bagian dari generasi Qur'ani yang berakhlak mulia dan berwawasan luas.</p>
        <a href="#" class="inline-block bg-primary-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:bg-primary-700 transition duration-300">Daftar Sekarang</a>
    </section>
</main>
<script>
    // Script untuk mobile menu toggle (bisa ditambahkan sesuai kebutuhan)
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.querySelector('button');
        // Implementasi toggle menu mobile dapat ditambahkan di sini
    });
</script>
@endsection