<?php

use App\Http\Controllers\admin\BerandaController;
use App\Http\Controllers\admin\CalenderEventController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MajorController;
use App\Http\Controllers\admin\GalleryAlbumController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\PhotoController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\admin\UploadImageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\public\AboutController;
use App\Http\Controllers\public\BeritaController;
use App\Http\Controllers\public\GaleriController;
use App\Http\Controllers\public\GuruController;
use App\Http\Controllers\public\HomeController;
use App\Http\Controllers\public\JurusanController;
use App\Http\Controllers\public\KalenderController;
use App\Http\Controllers\public\KontakController;
use App\Http\Controllers\public\SambutanController;
use Illuminate\Support\Facades\Route;


/* HALAMAN PUBLIK */
Route::name('public.')->group(function () {

    // BERANDA
    Route::get('/', [HomeController::class, 'index'])->name('home.index');


    // SAMBUTAN KEPSEK
    Route::get('/sambutan', [SambutanController::class, 'index'])->name('tentang.sambutan');


    // SEJARAH SEKOLAH
    Route::get('/sejarah', [AboutController::class, 'index'])->name('tentang.sejarah');


    // KONTAK
    Route::get('/kontak', [KontakController::class, 'index'])->name('tentang.kontak');


    // BERITA
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{news}', [BeritaController::class, 'show'])->name('berita.show');


    // JURUSAN
    Route::get('/jurusan/{major:slug}', [JurusanController::class, 'show'])->name('jurusan.show');


    // PROFIL GURU
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');


    // GALERI
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/{album:slug}', [GaleriController::class, 'show'])->name('galeri.show');


    // CALENDER EVENT
    Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender.index');
    // Route::get('/kalender-event', [KalenderController::class, 'show'])->name('kalender.show');
});



/* HALAMAN ADMIN */
Route::prefix('admin')->group(function () {

    // LOGIN GUEST ONLY
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'authenticate']);
    });

    // KALAU SUDAH LOGIN
    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/', fn() => redirect()->route('admin.dashboard'))->name('admin');

        Route::post('/upload/image', [UploadImageController::class, 'store'])->name('upload.image');

        // DASHBOARD
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


        // BERANDA
        Route::get('/beranda', [BerandaController::class, 'index'])->name('admin.beranda.index');
        Route::post('/beranda/hero', [BerandaController::class, 'updateHero'])->name('admin.beranda.hero');
        Route::post('/beranda/about', [BerandaController::class, 'updateAbout'])->name('admin.beranda.about');
        Route::post('/beranda/principal', [BerandaController::class, 'updatePrincipal'])->name('admin.beranda.principal');
        Route::post('/beranda/stats', [BerandaController::class, 'updateStats'])->name('admin.beranda.stats');
        Route::post('/beranda/school', [BerandaController::class, 'updateSchool'])->name('admin.beranda.school');


        // BERITA
        Route::get('/berita', [NewsController::class, 'index'])->name('admin.berita.index');
        Route::get('/berita/create', [NewsController::class, 'create'])->name('admin.berita.create');
        Route::post('/berita/store', [NewsController::class, 'store'])->name('admin.berita.store');
        Route::post('/berita/upload-image', [NewsController::class, 'storeContentImage'])->name('admin.berita.store.content.image');
        Route::get('/berita/{id}/edit', [NewsController::class, 'edit'])->name('admin.berita.edit');
        Route::put('/berita/{news}/update', [NewsController::class, 'update'])->name('admin.berita.update');
        Route::delete('/berita/{id}', [NewsController::class, 'destroy'])->name('admin.berita.destroy');


        // JURUSAN
        Route::get('/jurusan', [MajorController::class, 'index'])->name('admin.jurusan.index');
        Route::get('/jurusan/create', [MajorController::class, 'create'])->name('admin.jurusan.create');
        Route::post('/jurusan/store', [MajorController::class, 'store'])->name('admin.jurusan.store');
        Route::get('/jurusan/{major}/edit', [MajorController::class, 'edit'])->name('admin.jurusan.edit');
        Route::put('/jurusan/{major}/update', [MajorController::class, 'update'])->name('admin.jurusan.update');
        Route::delete('/jurusan/{major}/delete', [MajorController::class, 'destroy'])->name('admin.jurusan.destroy');


        // PROFIL GURU
        Route::get('/profil', [TeacherController::class, 'index'])->name('admin.profil.index');
        Route::get('/profil/create', [TeacherController::class, 'create'])->name('admin.profil.create');
        Route::post('/profil/store', [TeacherController::class, 'store'])->name('admin.profil.store');
        Route::get('/profil/{id}/edit', [TeacherController::class, 'edit'])->name('admin.profil.edit');
        Route::put('/profil/{teacher}/update', [TeacherController::class, 'update'])->name('admin.profil.update');
        Route::delete('/profil/{id}', [TeacherController::class, 'destroy'])->name('admin.profil.destroy');

        // GALERI
        Route::get('/galeri', [GalleryAlbumController::class, 'index'])->name('galeri.admin');
        Route::post('/galeri/store', [GalleryAlbumController::class, 'store'])->name('admin.galeri.create');
        Route::put('/galeri/update/{album}', [GalleryAlbumController::class, 'update'])->name('admin.galeri.update');
        Route::delete('/galeri/delete/{album}', [GalleryAlbumController::class, 'destroy'])->name('admin.galeri.destroy');
        Route::post('/galeri/photo/store', [PhotoController::class, 'store'])->name('admin.photo.create');
        Route::put('/galeri/photo/update/{photo}', [PhotoController::class, 'update'])->name('admin.photo.update');
        Route::delete('/galeri/photo/delete/{photo}', [PhotoController::class, 'destroy'])->name('admin.photo.destroy');


        // CALENDER EVENT
        Route::get('/kalender', [CalenderEventController::class, 'index'])->name('admin.kalender.index');
        Route::get('/calendar-events', [CalenderEventController::class, 'getEvents'])->name('admin.kalender.getevents');
        Route::get('/kalender/create', [CalenderEventController::class, 'create'])->name('admin.kalender.create');
        Route::post('/kalender/store', [CalenderEventController::class, 'store'])->name('admin.kalender.store');
        Route::get('/kalender/{event}/edit', [CalenderEventController::class, 'edit'])->name('admin.kalender.edit');
        Route::put('/kalender/{event}/update', [CalenderEventController::class, 'update'])->name('admin.kalender.update');
        Route::delete('/kalender/{event}/delete', [CalenderEventController::class, 'destroy'])->name('admin.kalender.destroy');


        // PENGATURAN
        Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan.admin');
        Route::put('/pengaturan/{user}/update', [UserController::class, 'update'])->name('admin.pengaturan.user.update');


        // LOGOUT
        Route::post('/logout', LogoutController::class)->name('logout');
    });
});
