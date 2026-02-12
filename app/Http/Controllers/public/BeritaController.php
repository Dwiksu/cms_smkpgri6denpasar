<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
        $news = News::getNews();
        return view('public.berita.index', compact('news'));
    }

    public function show(News $detail) {
        return view('public.berita.detail', compact('detail'));
    }
}