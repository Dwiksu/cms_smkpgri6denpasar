<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Photo;

class GalleryAlbum extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryAlbumFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'cover_image',
        'meta_title',
        'meta_description',
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public static function getGalleryForHome() {
        return self::orderBy('created_at', 'desc')->limit(5)->get();
    }

    public static function getGallery() {
        return self::latest()->paginate(9);
    }
}