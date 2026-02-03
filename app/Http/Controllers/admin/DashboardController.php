<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CalenderEvent;
use App\Models\GalleryAlbum;
use App\Models\Major;
use App\Models\News;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
                ['name' => 'Berita', 'count' => News::count(), 'icon' => 'newspaper', 'href' => '/admin/berita', 'color' => 'bg-blue-500'],
                ['name' => 'Jurusan', 'count' => Major::count(), 'icon' => 'graduation-cap', 'href' => '/admin/jurusan', 'color' => 'bg-green-500'],
                ['name' => 'Guru', 'count' => Teacher::count(), 'icon' => 'users', 'href' => '/admin/guru', 'color' => 'bg-orange-500'],
                ['name' => 'Album', 'count' => GalleryAlbum::count(), 'icon' => 'images', 'href' => '/admin/galeri', 'color' => 'bg-purple-500'],
                ['name' => 'Agenda', 'count' => CalenderEvent::count(), 'icon' => 'calendar', 'href' => '/admin/kalender', 'color' => 'bg-red-500'],
            ];

            $quickActions = [
                ['name' => 'Edit Beranda', 'description' => 'Ubah konten halaman utama', 'href' => '/admin/beranda', 'icon' => 'home'],
                ['name' => 'Tambah Berita', 'description' => 'Buat berita atau pengumuman baru', 'href' => '/admin/berita', 'icon' => 'newspaper'],
                ['name' => 'Kelola Jurusan', 'description' => 'Tambah atau edit jurusan', 'href' => '/admin/jurusan', 'icon' => 'graduation-cap'],
                ['name' => 'Kelola Kalender', 'description' => 'Tambah atau edit agenda sekolah', 'href' => '/admin/kalender', 'icon' => 'calendar'],
            ];

            $news = News::getNewsForDashboard();

            $events = CalenderEvent::getEventsForDashboard();
            
        return view('admin.dashboard', compact('stats', 'quickActions', 'news', 'events'));
    }
}