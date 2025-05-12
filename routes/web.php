<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\gallery\GalleryController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\program\ProgramController;
use App\Http\Controllers\Siswa\PembayaranController;
use App\Http\Controllers\SiswaDashboardController;
use App\Http\Controllers\SiswaProfileController;
use App\Http\Middleware\SiswaMiddleware;
use Illuminate\Support\Facades\Route;

Route::get(uri: '/', action: [FrontController::class,'index'])->name('index');
Route::get('/profile', [FrontController::class, 'profile'])->name('profile');


// Rute Berita
Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.show');
// end

// Rute Program
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');  
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.show');  
// end

// Rute Pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'showFormPendaftaran'])->name('siswa.pendaftaran');
Route::post('/pendaftaran', [PendaftaranController::class, 'prosesPendaftaran'])->name('siswa.pendaftaran.proses');
// end

// rute kontak
Route::get('/kontak', [FrontController::class, 'kontak'])->name('kontak');

// Rute Login
Route::get('/login', [PendaftaranController::class, 'showLoginForm'])->name('siswa.login');
Route::post('/login', [PendaftaranController::class, 'login'])->name('siswa.login.proses');

// rute gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
// emd

// rute timeline
Route::get('/timeline', [FrontController::class, 'timeline'])->name('timeline');

// Rute yang dilindungi Auth Siswa
Route::middleware('auth.siswa')->group(function () {
    Route::get('/dashboard', [PendaftaranController::class, 'dashboard'])->name('siswa.dashboard');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    // edit profile
    Route::get('/profile/edit', [SiswaProfileController::class, 'edit'])->name('siswa.profile.edit');
    Route::put('/profile/update', [SiswaProfileController::class, 'update'])->name('siswa.profile.update');
    // dashboard pembayaran
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.detail');
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'cancel'])->name('pembayaran.cancel');
    Route::post('/logout', [PendaftaranController::class, 'logout'])->name('siswa.logout');
});