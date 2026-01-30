<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use Illuminate\Support\Facades\Route;


/* HALAMAN ADMIN */
Route::prefix('admin')->group(function () {

  // LOGIN GUEST ONLY
  Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
  });

  // KALAU SUDAH LOGIN
  Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/', fn() => redirect()->route('dashboard.admin'));

    Route::get('/dashboard', function () {
      return view('admin.dashboard');
    })->name('dashboard.admin');

    Route::get('/beranda', fn() => view('admin.konten-beranda'))->name('beranda.admin');
    Route::get('/berita', fn() => view('admin.berita'))->name('berita.admin');
    Route::get('/kategori-berita', fn() => view('admin.kategori-berita'))->name('kategori-berita.admin');
    Route::get('/jurusan', fn() => view('admin.jurusan'))->name('jurusan.admin');
    Route::get('/profil', fn() => view('admin.profil-guru'))->name('profil.admin');
    Route::get('/galeri', fn() => view('admin.galeri'))->name('galeri.admin');
    Route::get('/kalender', fn() => view('admin.kalender'))->name('kalender.admin');
    Route::get('/pengaturan', fn() => view('admin.pengaturan'))->name('pengaturan.admin');
    
    // LOGOUT
    Route::post('/logout', LogoutController::class)->name('logout');
  });

});