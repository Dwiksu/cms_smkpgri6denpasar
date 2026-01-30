<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrincipalMessage extends Model
{
    /** @use HasFactory<\Database\Factories\PrincipalMessageFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'nip',
        'photo',
        'position',
        'period',
        'message',
    ];
}