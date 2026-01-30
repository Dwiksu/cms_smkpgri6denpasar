<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}