<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\GalleryAlbum;
use App\Models\Hero;
use App\Models\Major;
use App\Models\News;
use App\Models\Stat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::firstOrFail();
        $stat = Stat::firstOrFail();
        $aboutDesc = About::getAboutDesc();
        $majors = Major::getMajorForHome();
        $news = News::getNewsForHome();
        $galleries = GalleryAlbum::getGalleryForHome();

        return view('public.home.index', compact('hero', 'stat', 'aboutDesc', 'majors', 'news', 'galleries'));
    }    
}