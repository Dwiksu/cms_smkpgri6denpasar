<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\About;
use App\Models\GalleryAlbum;
use App\Models\Major;
use App\Models\News;
use App\Models\Stat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::firstOrFail();
        $about = About::firstOrFail();
        $stats = Stat::all();
        $majors = Major::getMajor();
        $news = News::latest()->paginate(6);

        $galleries = galleryAlbum::latest()->paginate(5);
        return view('public.home.index', compact('hero', 'about', 'stats', 'majors', 'news', 'galleries'));
    }
}
