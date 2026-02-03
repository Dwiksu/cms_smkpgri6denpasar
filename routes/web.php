<?php

use App\Http\Controllers\admin\BerandaController;
use App\Http\Controllers\admin\CalenderEventController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MajorController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\admin\UploadImageController;
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
        Route::get('/berita/{news}/edit', [NewsController::class, 'edit'])->name('admin.berita.edit');
        Route::put('/berita/{news}/update', [NewsController::class, 'update'])->name('admin.berita.update');
        Route::delete('/berita/{news}/delete', [NewsController::class, 'destroy'])->name('admin.berita.destroy');


        // JURUSAN
        Route::get('/jurusan', [MajorController::class, 'index'])->name('admin.jurusan.index');
        Route::get('/jurusan/create', [MajorController::class, 'create'])->name('admin.jurusan.create');
        Route::post('/jurusan/store', [MajorController::class, 'store'])->name('admin.jurusan.store');


        // PROFIL GURU
        Route::get('/profil', [TeacherController::class, 'index'])->name('admin.profil.index');
        Route::get('/profil/create', [TeacherController::class, 'create'])->name('admin.profil.create');
        Route::post('/profil/store', [TeacherController::class, 'store'])->name('admin.profil.store');


        // GALERI
        Route::get('/galeri', function () {
            $albums = [
                [
                    'id' => 1,
                    'name' => 'Kegiatan Sekolah',
                    'slug' => 'kegiatan-sekolah',
                    'description' => 'Dokumentasi berbagai kegiatan yang berlangsung di sekolah',
                    'cover_image' => 'https://images.unsplash.com/photo-1666533835131-5cd525e9e965?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'photos' => [
                        [
                            'id' => 'p1',
                            'url' => 'https://images.unsplash.com/photo-1666533835131-5cd525e9e965?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                            'caption' => 'Upacara Bendera',
                            'created_at' => '2024-01-15 00:00:00',
                        ],
                        [
                            'id' => 'p2',
                            'url' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800&q=80',
                            'caption' => 'Kegiatan Belajar',
                            'created_at' => '2024-01-15 00:00:00',
                        ],
                    ],
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
                [
                    'id' => 2,
                    'name' => 'Fasilitas Sekolah',
                    'slug' => 'fasilitas-sekolah',
                    'description' => 'Fasilitas modern yang tersedia di sekolah kami',
                    'cover_image' => 'https://images.unsplash.com/photo-1562774053-701939374585?w=800&q=80',
                    'photos' => [
                        [
                            'id' => 'p3',
                            'url' => 'https://images.unsplash.com/photo-1562774053-701939374585?w=800&q=80',
                            'caption' => 'Gedung Sekolah',
                            'created_at' => '2024-01-15 00:00:00',
                        ],
                        [
                            'id' => 'p4',
                            'url' => 'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?w=800&q=80',
                            'caption' => 'Laboratorium Komputer',
                            'created_at' => '2024-01-15 00:00:00',
                        ],
                    ],
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
                [
                    'id' => 3,
                    'name' => 'Prestasi Siswa',
                    'slug' => 'prestasi-siswa',
                    'description' => 'Prestasi yang diraih oleh siswa-siswi kami',
                    'cover_image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=800&q=80',
                    'photos' => [
                        [
                            'id' => 'p5',
                            'url' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=800&q=80',
                            'caption' => 'Lomba Kompetensi Siswa',
                            'created_at' => '2024-01-15 00:00:00',
                        ],
                    ],
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
            ];

            return view('admin.galeri', compact('albums'));
        })->name('galeri.admin');


        // CALENDER EVENT
        Route::get('/kalender', [CalenderEventController::class, 'index'])->name('admin.kalender.index');
        Route::get('/kalender/create', [CalenderEventController::class, 'create'])->name('admin.kalender.create');
        Route::post('/kalender/store', [CalenderEventController::class, 'store'])->name('admin.kalender.store');


        // PENGATURAN
        Route::get('/pengaturan', fn() => view('admin.pengaturan'))->name('pengaturan.admin');


        // LOGOUT
        Route::post('/logout', LogoutController::class)->name('logout');
    });
});

Route::get('/', function () {
    return view('welcome');
});