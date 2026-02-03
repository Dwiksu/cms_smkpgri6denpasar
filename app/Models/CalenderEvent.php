<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalenderEvent extends Model
{
    /** @use HasFactory<\Database\Factories\CalenderEventFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'category',
        'color',
    ];

    public static function getEvents() {
        return self::where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->latest('start_date')
            ->paginate(5);
    }

    public static function getEventsForDashboard()
    {
        return self::select('start_date', 'title', 'category')
            ->where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();
    }
}