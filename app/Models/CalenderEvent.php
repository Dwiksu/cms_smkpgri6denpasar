<?php

namespace App\Models;

use Carbon\Carbon;
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
    ];

    public static function getEventsForDashboard()
    {
        return self::select('start_date', 'title', 'category')
            ->where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();
    }

    public static function getEventsData()
{
    return self::all()->map(function ($e) {
        return [
            'id'          => $e->id,
            'title'       => $e->title,
            'start'       => Carbon::parse($e->start_date)->toDateString(),
            'end'         => Carbon::parse($e->end_date)->addDay()->toDateString(),
            'allDay'      => true,
            'description' => $e->description,
            'category'    => $e->category,
            'color'       => match ($e->category) {
                'libur'    => '#efb100',
                'ujian'    => '#fb2c36',
                'akademik' => '#1447e6',
                'kegiatan' => '#00c951',
                default    => '#2563eb',
            }
        ];
    });
}
}