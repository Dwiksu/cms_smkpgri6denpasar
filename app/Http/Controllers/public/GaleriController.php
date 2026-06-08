<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\Photo;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::getGallery();
        return view('public.galeri.index', compact('albums'));
    }

    public function show(GalleryAlbum $album)
    {
        $photos = $album->photos();
        return view('public.galeri.detail', compact('album', 'photos'));
    }
}
