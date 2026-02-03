<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolValue extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolValueFactory> */
    use HasFactory;

    protected $fillable = [
        'about_id',
        'name',
        'description',
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}