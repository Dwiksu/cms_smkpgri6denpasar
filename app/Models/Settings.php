<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /** @use HasFactory<\Database\Factories\SettingsFactory> */
    use HasFactory;

    protected $fillable = [
      'site_name',
      'logo',
      'addres',
      'phone',
      'email',
      'facebook',
      'instagram',
      'meta_title',
      'meta_description',  
    ];
}