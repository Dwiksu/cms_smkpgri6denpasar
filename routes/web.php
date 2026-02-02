<?php

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

        Route::get('/', fn() => redirect()->route('dashboard.admin'));

        Route::post('/upload/image', [UploadImageController::class, 'store'])->name('upload.image');

        Route::get('/dashboard', function () {
            $stats = [
                ['name' => 'Berita', 'count' => 3, 'icon' => 'newspaper', 'href' => '/admin/berita', 'color' => 'bg-blue-500'],
                ['name' => 'Jurusan', 'count' => 3, 'icon' => 'graduation-cap', 'href' => '/admin/jurusan', 'color' => 'bg-green-500'],
                ['name' => 'Guru', 'count' => 3, 'icon' => 'users', 'href' => '/admin/guru', 'color' => 'bg-orange-500'],
                ['name' => 'Album', 'count' => 3, 'icon' => 'images', 'href' => '/admin/galeri', 'color' => 'bg-purple-500'],
                ['name' => 'Agenda', 'count' => 3, 'icon' => 'calendar', 'href' => '/admin/kalender', 'color' => 'bg-red-500'],
            ];

            $quickActions = [
                ['name' => 'Edit Beranda', 'description' => 'Ubah konten halaman utama', 'href' => '/admin/beranda', 'icon' => 'home'],
                ['name' => 'Tambah Berita', 'description' => 'Buat berita atau pengumuman baru', 'href' => '/admin/berita', 'icon' => 'newspaper'],
                ['name' => 'Kelola Jurusan', 'description' => 'Tambah atau edit jurusan', 'href' => '/admin/jurusan', 'icon' => 'graduation-cap'],
                ['name' => 'Kelola Kategori', 'description' => 'Tambah atau edit kategori berita', 'href' => '/admin/kategori', 'icon' => 'tags'],
            ];

            $news = [
                [
                    'title' => 'Siswa SMK Negeri 1 Raih Juara 1 Lomba Kompetensi Siswa Tingkat Nasional',
                    'slug' => 'siswa-smk-raih-juara-lks-nasional',
                    'excerpt' => 'Prestasi membanggakan diraih oleh siswa SMK Negeri 1.',
                    'content' => '<p>Prestasi membanggakan kembali diraih...</p>',
                    'category_id' => 'cat-3',
                    'image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=800&q=80',
                    'author' => 'Admin',
                    'published_at' => '2024-11-22 10:00:00',
                ],
                [
                    'title' => 'Pendaftaran Peserta Didik Baru Tahun Ajaran 2025/2026 Dibuka',
                    'slug' => 'pendaftaran-ppdb-2025-2026',
                    'excerpt' => 'SMK Negeri 1 membuka pendaftaran peserta didik baru.',
                    'content' => '<p>Pendaftaran dibuka mulai Januari...</p>',
                    'category_id' => 'cat-2',
                    'image' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800&q=80',
                    'author' => 'Admin',
                    'published_at' => '2024-12-01 08:00:00',
                ],
                [
                    'title' => 'Kunjungan Industri ke PT. Technology Indonesia',
                    'slug' => 'kunjungan-industri-pt-technology',
                    'excerpt' => 'Siswa TKJ melaksanakan kunjungan industri.',
                    'content' => '<p>Kegiatan diikuti oleh 40 siswa...</p>',
                    'category_id' => 'cat-1',
                    'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80',
                    'author' => 'Admin',
                    'published_at' => '2024-12-10 14:00:00',
                ],
            ];

            $events = [
                [
                    'id' => 1,
                    'title' => 'Ujian Akhir Semester Ganjil',
                    'description' => 'Pelaksanaan UAS semester ganjil untuk semua tingkat',
                    'start_date' => '2024-12-09',
                    'end_date' => '2024-12-20',
                    'category' => 'ujian',
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
                [
                    'id' => 2,
                    'title' => 'Libur Akhir Tahun',
                    'description' => 'Libur semester ganjil dan tahun baru',
                    'start_date' => '2024-12-21',
                    'end_date' => '2025-01-05',
                    'category' => 'libur',
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
                [
                    'id' => 3,
                    'title' => 'Masuk Semester Genap',
                    'description' => 'Hari pertama masuk semester genap tahun ajaran 2024/2025',
                    'start_date' => '2025-01-06',
                    'end_date' => null, // optional jika 1 hari
                    'category' => 'akademik',
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
            ];



            return view('admin.dashboard', compact('stats', 'quickActions', 'news', 'events'));
        })->name('dashboard.admin');

        Route::get('/beranda', fn() => view('admin.konten-beranda'))->name('beranda.admin');
        Route::get('/berita', function () {
            $news = [
                [
                    'id' => 1,
                    'title' => 'Siswa SMK Negeri 1 Raih Juara 1 Lomba Kompetensi Siswa Tingkat Nasional',
                    'slug' => 'siswa-smk-raih-juara-lks-nasional',
                    'excerpt' => 'Prestasi membanggakan diraih oleh siswa SMK Negeri 1 dalam ajang Lomba Kompetensi Siswa (LKS) tingkat nasional.',
                    'content' => '
            <p>Prestasi membanggakan kembali diraih oleh siswa SMK Negeri 1 dalam ajang Lomba Kompetensi Siswa (LKS) tingkat nasional yang diselenggarakan pada tanggal 15-20 November 2024 di Jakarta.</p>
            <p>Ahmad Fajar, siswa kelas XII jurusan Teknik Komputer dan Jaringan berhasil meraih juara 1 dalam kategori IT Network Systems Administration.</p>
            <p>Kepala Sekolah menyampaikan apresiasi yang tinggi atas prestasi yang diraih.</p>
        ',
                    'category_id' => 3,
                    'image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=800&q=80',
                    'author' => 'Admin',
                    'published_at' => '2024-11-22 10:00:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'title' => 'Pendaftaran Peserta Didik Baru Tahun Ajaran 2025/2026 Dibuka',
                    'slug' => 'pendaftaran-ppdb-2025-2026',
                    'excerpt' => 'SMK Negeri 1 membuka pendaftaran peserta didik baru untuk tahun ajaran 2025/2026.',
                    'content' => '
            <p>SMK Negeri 1 mengumumkan pembukaan pendaftaran peserta didik baru untuk tahun ajaran 2025/2026.</p>
            <p>Pendaftaran dapat dilakukan secara online mulai 1 Januari hingga 31 Maret 2025.</p>
            <h3>Persyaratan:</h3>
            <ul>
                <li>Lulusan SMP/MTs sederajat</li>
                <li>Usia maksimal 21 tahun</li>
                <li>Sehat jasmani dan rohani</li>
            </ul>
        ',
                    'category_id' => 2,
                    'image' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800&q=80',
                    'author' => 'Admin',
                    'published_at' => '2024-12-01 08:00:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 3,
                    'title' => 'Kunjungan Industri ke PT. Technology Indonesia',
                    'slug' => 'kunjungan-industri-pt-technology',
                    'excerpt' => 'Siswa jurusan TKJ melaksanakan kunjungan industri.',
                    'content' => '
            <p>SMK Negeri 1 menyelenggarakan kunjungan industri ke PT. Technology Indonesia pada 10 Desember 2024.</p>
            <p>Kegiatan ini diikuti oleh 40 siswa kelas XI.</p>
            <p>Siswa melihat langsung proses kerja di industri IT.</p>
        ',
                    'category_id' => 1,
                    'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80',
                    'author' => 'Admin',
                    'published_at' => '2024-12-10 14:00:00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ];

            return view('admin.news.berita', compact('news'));
        })->name('berita.admin');
        Route::get('/berita/create', [NewsController::class, 'create'])->name('berita.create.admin');

        Route::get('/kategori-berita', fn() => view('admin.kategori-berita'))->name('kategori-berita.admin');
        Route::get('/jurusan', function () {
            $majors = [
                [
                    'id' => 1,
                    'name' => 'Teknik Komputer dan Jaringan',
                    'slug' => 'teknik-komputer-jaringan',
                    'short_name' => 'TKJ',
                    'description' => 'Program keahlian yang mempelajari tentang perakitan komputer, instalasi sistem operasi, jaringan komputer, dan administrasi server.',
                    'full_description' => '
            <p>Teknik Komputer dan Jaringan (TKJ) adalah program keahlian yang mempersiapkan siswa untuk menjadi tenaga ahli di bidang teknologi informasi dan komunikasi.</p>
            <p>Siswa akan mempelajari berbagai aspek teknis mulai dari perakitan dan perawatan komputer, instalasi sistem operasi, hingga perancangan dan pengelolaan jaringan komputer.</p>
        ',
                    'icon' => 'monitor',
                    'image' => 'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?w=800&q=80',
                    'gallery' => [
                        'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?w=800&q=80',
                        'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&q=80',
                    ],
                    'curriculum' => [
                        'Komputer dan Jaringan Dasar',
                        'Pemrograman Dasar',
                        'Sistem Komputer',
                        'Administrasi Infrastruktur Jaringan',
                        'Teknologi Layanan Jaringan',
                        'Keamanan Jaringan',
                    ],
                    'careers' => [
                        'Network Administrator',
                        'IT Support Specialist',
                        'System Administrator',
                        'Network Engineer',
                        'Technical Support',
                    ],
                    'achievements' => [
                        'Juara 1 LKS Tingkat Nasional 2024',
                        'Juara 2 Olimpiade Jaringan Komputer 2023',
                    ],
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
                [
                    'id' => 2,
                    'name' => 'Rekayasa Perangkat Lunak',
                    'slug' => 'rekayasa-perangkat-lunak',
                    'short_name' => 'RPL',
                    'description' => 'Program keahlian yang fokus pada pengembangan aplikasi, pemrograman, dan pengembangan sistem informasi.',
                    'full_description' => '
            <p>Rekayasa Perangkat Lunak (RPL) adalah program keahlian yang mempersiapkan siswa untuk menjadi pengembang software profesional.</p>
            <p>Kurikulum dirancang untuk memberikan pemahaman mendalam tentang siklus pengembangan perangkat lunak, mulai dari analisis kebutuhan hingga deployment.</p>
        ',
                    'icon' => 'code',
                    'image' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=800&q=80',
                    'gallery' => [
                        'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=800&q=80',
                        'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&q=80',
                    ],
                    'curriculum' => [
                        'Pemrograman Dasar',
                        'Pemrograman Berorientasi Objek',
                        'Basis Data',
                        'Pemrograman Web dan Mobile',
                        'Pengembangan Game',
                        'Produk Kreatif dan Kewirausahaan',
                    ],
                    'careers' => [
                        'Software Developer',
                        'Web Developer',
                        'Mobile App Developer',
                        'Database Administrator',
                        'Quality Assurance',
                    ],
                    'achievements' => [
                        'Juara 1 Hackathon Nasional 2024',
                        'Best App Innovation Award 2023',
                    ],
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
                [
                    'id' => 3,
                    'name' => 'Multimedia',
                    'slug' => 'multimedia',
                    'short_name' => 'MM',
                    'description' => 'Program keahlian di bidang desain grafis, animasi, videografi, dan produksi konten digital.',
                    'full_description' => '
            <p>Multimedia adalah program keahlian yang mempersiapkan siswa untuk berkarir di industri kreatif digital.</p>
            <p>Siswa akan menguasai berbagai software desain dan editing profesional untuk menghasilkan karya-karya berkualitas.</p>
        ',
                    'icon' => 'palette',
                    'image' => 'https://images.unsplash.com/photo-1626785774573-4b799315345d?w=800&q=80',
                    'gallery' => [
                        'https://images.unsplash.com/photo-1626785774573-4b799315345d?w=800&q=80',
                        'https://images.unsplash.com/photo-1558655146-d09347e92766?w=800&q=80',
                    ],
                    'curriculum' => [
                        'Desain Grafis',
                        'Animasi 2D dan 3D',
                        'Videografi dan Editing',
                        'Fotografi',
                        'Desain Web',
                        'Produksi Audio Visual',
                    ],
                    'careers' => [
                        'Graphic Designer',
                        'Video Editor',
                        'Motion Graphic Artist',
                        'UI/UX Designer',
                        'Content Creator',
                    ],
                    'achievements' => [
                        'Best Creative Video Award 2024',
                        'Juara 2 Desain Grafis Tingkat Provinsi',
                    ],
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
            ];

            return view('admin.majors.jurusan', compact('majors'));
        })->name('jurusan.admin');
        Route::get('/jurusan/create', fn() => view('admin.majors.form-jurusan'))->name('jurusan.create.admin');

        Route::get('/profil', [TeacherController::class, 'index'])->name('profil.admin');
        Route::get('/profil/create', [TeacherController::class, 'create'])->name('form.profil.admin');
        Route::post('/profil/store', [TeacherController::class, 'store'])->name('store.profil.admin');

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
        Route::get('/kalender', function () {
            $events = [
                [
                    'id' => 1,
                    'title' => 'Ujian Akhir Semester Ganjil',
                    'description' => 'Pelaksanaan UAS semester ganjil untuk semua tingkat',
                    'start_date' => '2024-12-09',
                    'end_date' => '2024-12-20',
                    'category' => 'ujian',
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
                [
                    'id' => 2,
                    'title' => 'Libur Akhir Tahun',
                    'description' => 'Libur semester ganjil dan tahun baru',
                    'start_date' => '2024-12-21',
                    'end_date' => '2025-01-05',
                    'category' => 'libur',
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
                [
                    'id' => 3,
                    'title' => 'Masuk Semester Genap',
                    'description' => 'Hari pertama masuk semester genap tahun ajaran 2024/2025',
                    'start_date' => '2025-01-06',
                    'end_date' => null,
                    'category' => 'akademik',
                    'created_at' => '2024-01-01 00:00:00',
                    'updated_at' => '2024-01-01 00:00:00',
                ],
            ];

            return view('admin.calendars.kalender', compact('events'));
        })->name('kalender.admin');
        Route::get('/kalender/create', fn() => view('admin.calendars.form-kalender'))->name('kalender.create.admin');

        Route::get('/pengaturan', fn() => view('admin.pengaturan'))->name('pengaturan.admin');

        // LOGOUT
        Route::post('/logout', LogoutController::class)->name('logout');
    });
});

Route::get('/', function () {
    return view('welcome');
});
