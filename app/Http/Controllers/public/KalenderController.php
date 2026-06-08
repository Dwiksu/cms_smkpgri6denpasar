<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\CalenderEvent;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        $events = CalenderEvent::all();
        return view('public.kalender.index', compact('events'));
    }

    public function show()
    {
        return response()->json(
            CalenderEvent::getEventsData()
        );
    }
}
