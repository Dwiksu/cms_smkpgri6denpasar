<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryPhotos extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryPhotosFactory> */
    use HasFactory;

    protected $fillable = [
        'image',
        'caption',
    ];

    public function gallery() : BelongsTo {
        return $this->belongsTo(Galleries::class);
    }
}