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

    protected $appends = ['published_at_formatted'];

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
            ->paginate(5);
    }

    public static function getNewsForDashboard()
    {
        return self::select('title', 'category', 'image')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();
    }
}
