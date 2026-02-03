<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'nip',
        'position',
        'subject',
        'major_id',
        'photo',
        'email',
        'phone',
        'education',
    ];

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }

    public static function getTeacher() {
        return self::with('major')->latest()->paginate(10);
    }
    public static function getTeacher2() {
        return self::latest()->paginate(10);
    }

    
}