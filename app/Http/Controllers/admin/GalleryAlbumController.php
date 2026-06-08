<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;

class GalleryAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = GalleryAlbum::with('photos')->latest()->get();
        return view('admin.albums.galeri', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'cover_image' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ], [
            'name.required' => 'Nama galeri harus diisi',
            'cover_image.required' => 'Cover galeri harus diisi',
        ]);

        $slug = str()->slug($data['name']);
        $originalSlug = $slug;
        $count = 1;

        while (GalleryAlbum::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;

        GalleryAlbum::create($data);

        return back()->with('success', 'Galeri berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryAlbum $album)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'cover_image' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ], [
            'name.required' => 'Nama galeri harus diisi',
            'cover_image.required' => 'Cover galeri harus diisi',
        ]);

        $slug = str()->slug($data['name']);

        $count = GalleryAlbum::where('slug', 'like', $slug . '%')
            ->where('id', '!=', $album->id)
            ->count();

        $data['slug'] = $count
            ? $slug . '-' . ($count + 1)
            : $slug;


        $album->update($data);

        return back()->with('success', 'Galeri berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryAlbum $album)
    {
        $album->delete();
        return back()->with('success', 'Galeri berhasil dihapus');
    }
}