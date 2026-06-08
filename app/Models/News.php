<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'image',
        'author',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $appends = ['published_at_formatted', 'category_color'];


    public function getPublishedAtFormattedAttribute()
    {
        return $this->published_at
            ? $this->published_at->translatedFormat('d F Y')
            : null;
    }

    public static function getNews()
    {
        return self::where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->latest('published_at')
            ->paginate(6);
    }

    public static function getNewsForDashboard()
    {
        return self::select('title', 'category', 'image')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();
    }

    public static function getNewsForHome()
    {
        return self::where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->latest('published_at')
            ->paginate(6);
    }
    function getCategoryColorAttribute(): string
    {
        return match ($this->category) {
            'berita' => 'bg-green-100 text-green-800',
            'kegiatan' => 'bg-amber-100 text-amber-800',
            'pengumuman' => 'bg-red-100 text-red-800',
            'prestasi' => 'bg-blue-100 text-blue-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}
