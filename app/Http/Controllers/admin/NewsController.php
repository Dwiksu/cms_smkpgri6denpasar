<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $news = News::when($request->search, function ($q) use ($request) {
            $q->where('title', 'like', "%{$request->search}%");
        })
            ->latest()
            ->paginate($perPage);

        return $request->ajax()
            ? response()->json($news)
            : view('admin.news.berita', compact('news'));
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
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'required|string',
            'published_at' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ], [
            'title.required' => 'Judul berita harus diisi',
            'excerpt.required' => 'Ringkasan berita harus diisi',
            'content.required' => 'Isi berita harus diisi',
            'category.required' => 'Kategori berita harus diisi',
            'image.required' => 'Gambar berita harus diisi',
            'published_at.required' => 'Tanggal publikasi harus diisi',
        ]);

        $slug = str()->slug($data['title']);
        $originalSlug = $slug;
        $count = 1;

        while (News::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug;


        $data['author'] = auth()->user()->name ?? 'Admin';

        News::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function storeContentImage(Request $request)
    {
        if (!$request->hasFile('upload')) {
            return response()->json([
                'uploaded' => 0,
                'error' => ['message' => 'No file uploaded']
            ], 400);
        }

        $path = $request->file('upload')
            ->store('berita/content', 'public');

        return response()->json([
            'uploaded' => 1,
            'fileName' => basename($path),
            'url' => asset('storage/' . $path),
        ]);
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
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.form-berita', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'image' => 'required|string',
            'published_at' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ], [
            'title.required' => 'Judul berita harus diisi',
            'excerpt.required' => 'Ringkasan berita harus diisi',
            'content.required' => 'Isi berita harus diisi',
            'category.required' => 'Kategori berita harus diisi',
            'image.required' => 'Gambar berita harus diisi',
            'published_at.required' => 'Tanggal publikasi harus diisi',
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
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dihapus'
        ]);
    }
}