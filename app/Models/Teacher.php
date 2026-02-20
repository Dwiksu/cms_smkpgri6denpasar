<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Major;
use Illuminate\Http\Request;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'subject',
        'major_id',
        'photo',
    ];

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }

    public static function getTeacher()
    {
        return self::with('major')->latest()->paginate(10);
    }

    public static function getProfilGuru(Request $request, int $perPage = 12)
    {
        return self::with('major')
            ->when($request->filled('filter') && $request->filter !== 'all', function ($q) use ($request) {
                $q->where('major_id', $request->filter);
            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
    }
}