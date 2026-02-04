<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::with('album')->latest()->get();
        return view('admin.galeri', compact('photos'));
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
            'gallery_album_id' => 'required|exists:gallery_albums,id',
            'url' => 'required|array',
            'url.*' => 'required|string|max:255',
            'caption' => 'nullable|string|max:255',
        ], [
            'url.required' => 'URL foto harus diisi',
            'url.*.required' => 'URL foto harus diisi',
        ]);

        $photos = collect($data['url'])->map(fn($url) => [
            'gallery_album_id' => $data['gallery_album_id'],
            'url' => $url,
            'caption' => $data['caption'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Photo::insert($photos->toArray());

        return back()->with('success', 'Foto berhasil ditambahkan');
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
    public function update(Request $request, Photo $photo)
    {
        $data = $request->validate([
            'gallery_album_id' => 'exists:gallery_albums,id',
            'url' => 'required|string|max:255',
            'caption' => 'nullable|string|max:255',
        ]);

        $photo->update($data);

        return back()->with('success', 'Foto berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return back()->with('success', 'Foto berhasil dihapus');
    }
}