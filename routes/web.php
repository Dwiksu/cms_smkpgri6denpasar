<?php

use Illuminate\Support\Facades\Route;


/* HALAMAN ADMIN */
Route::prefix('admin')->group(function () {
  
  Route::get('/', function () {
    return view('admin.dashboard');
  })->name('dashboard.admin');

  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  })->name('dashboard.admin');
  
  Route::get('/beranda', function () {
    return view('admin.konten-beranda');
  })->name('beranda.admin');
  
  Route::get('/berita', function () {
    return view('admin.berita');
  })->name('berita.admin');
  
  Route::get('/jurusan', function () {
    return view('admin.jurusan');
  })->name('jurusan.admin');
  
  Route::get('/profil', function () {
    return view('admin.profil-guru');
  })->name('profil.admin');
  
  Route::get('/galeri', function () {
    return view('admin.galeri');
  })->name('galeri.admin');
  
  Route::get('/kalender', function () {
    return view('admin.kalender');
  })->name('kalender.admin');
  
  Route::get('/pengaturan', function () {
    return view('admin.pengaturan');
  })->name('pengaturan.admin');
  
});