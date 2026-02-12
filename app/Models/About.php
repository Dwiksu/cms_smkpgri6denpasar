<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class About extends Model
{
    /** @use HasFactory<\Database\Factories\AboutFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'vision',
        'mission',
        'image',
        'history',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'mission' => 'array',
    ];
    

    // PUBLIC
    public static function getAboutDesc() {
        return self::select('description')->first();
    }
}