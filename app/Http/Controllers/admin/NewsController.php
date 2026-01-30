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
        $news = News::with('category')->latest()->get();
        return view('admin.berita', compact('news'));
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
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'category_id' => 'required|exists:news_categories,id',
            'image' => 'required|string',
            'published_at' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);
        
        $data['slug'] = str()->slug($data['title']);
        $data['author'] = auth()->user()->name ?? 'Admin';

        News::create($data);

        return redirect()
            ->route('berita.admin')
            ->with('success', 'Hero berhasil ditambahkan');
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
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'category_id' => 'required|exists:news_categories,id',
            'image' => 'required|string',
            'author' => 'required|string|max:100',
            'published_at' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $data['slug'] = str()->slug($data['title']);

        $news->update($data);

        return redirect()
            ->route('berita.admin')
            ->with('success', 'Hero berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()
            ->route('berita.admin')
            ->with('success', 'Hero berhasil dihapus');
    }
}