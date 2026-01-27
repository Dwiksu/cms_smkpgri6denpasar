<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Galleries extends Model
{
    /** @use HasFactory<\Database\Factories\GalleriesFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function photos() : HasMany {
        return $this->hasMany(GalleryPhotos::class);
    }
}