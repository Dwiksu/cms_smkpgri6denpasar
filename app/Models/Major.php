<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Teacher;

class Major extends Model
{
    /** @use HasFactory<\Database\Factories\MajorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_name',
        'full_description',
        'image',
        'gallery',
        'curriculum',
        'careers',
        'achievements'
    ];

    protected $casts = [
        'gallery' => 'array',
        'curriculum' => 'array',
        'careers' => 'array',
        'achievements' => 'array'
    ];

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public static function getMajor()
    {
        return self::latest()->paginate(10);
    }

    public static function getMajorForTeacherForm()
    {
        return self::select('id', 'name')->latest()->get();
    }

    public static function getMajorForHome()
    {
        return self::latest()->limit(3);
    }

    public static function getTeacherByMajor($major)
    {
        return self::withWhereHas(
            'teachers',
            fn($query)
            => $query->where('major_id', $major)
        )
            ->get();
    }
}