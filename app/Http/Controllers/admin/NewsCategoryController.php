<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = NewsCategory::with('news')->latest()->get();
        return view('admin.kategori-berita', compact('categories'));
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
            'color' => 'required',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $data['slug'] = str()->slug($data['name']);

        NewsCategory::create($data);

        return back()->with('success', 'Kategori Berita berhasil ditambahkan');
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
    public function update(Request $request, NewsCategory $categories)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $data['slug'] = str()->slug($data['name']);

        $categories->update($data);

        return back()->with('success', 'Kategori Berita berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsCategory $categories)
    {
        $categories->delete();
        return back()->with('success', 'Kategori Berita berhasil dihapus');
    }
}