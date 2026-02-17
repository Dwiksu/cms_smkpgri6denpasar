<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query()->latest('published_at');

        // Filter Pencarian
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('excerpt', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Enum Category
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $news = $query->paginate(9);

        // Daftar kategori sesuai Enum di database
        $categories = ['berita', 'pengumuman', 'prestasi', 'kegiatan'];
        return view('public.berita.index', compact('news', 'categories'));
    }

    public function show(News $detail)
    {
        $relatedNews = News::where('category', $detail->category)
            ->where('id', '!=', $detail->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.berita.detail', compact('detail', 'relatedNews'));
    }
}
