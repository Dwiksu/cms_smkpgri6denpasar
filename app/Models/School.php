<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolFactory> */
    use HasFactory;

    protected $fillable = [
        'short_name',
        'full_name',
        'address',
        'office_phone',
        'whatsapp_phone',
        'email',
        'website',
        'facebook',
        'instagram',
        'youtube',
        'tiktok',
        'ppdb_link',
    ];
}