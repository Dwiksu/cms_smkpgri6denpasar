<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::getNews();
        return view('admin.news.berita', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.form-berita');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|string',
            'published_at' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $data['slug'] = str()->slug($data['title']);
        $data['author'] = auth()->user()->name ?? 'Admin';

        News::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
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
    public function edit(News $news)
    {
        return view('admin.news.form-berita', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|string',
            'published_at' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $data['slug'] = str()->slug($data['title']);

        $news->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}