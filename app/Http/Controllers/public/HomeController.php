<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\GalleryAlbum;
use App\Models\Hero;
use App\Models\Major;
use App\Models\News;
use App\Models\School;
use App\Models\Stat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $visibleStats = Stat::all()
            ->filter(fn($s) => $s->value > 0)
            ->values();
            

        return view('public.home.index', [
            'stats' => $visibleStats,
            'statsCount' => $visibleStats->count(),
            'hero' => Hero::firstOrFail(),
            'about' => About::getAboutForHome(),
            'majors' => Major::getMajorForHome(),
            'news' => News::getNewsForHome(),
            'galleries' => GalleryAlbum::getGalleryForHome(),
            'ppdb_link' => School::select('ppdb_link')->first()->ppdb_link,
        ]);
    }
}