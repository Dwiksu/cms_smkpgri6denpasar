<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'address',
        'phone',
        'email',
        'website',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'map_embed',
    ];
}