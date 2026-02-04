<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CalenderEvent;
use Illuminate\Http\Request;

class CalenderEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = CalenderEvent::getEvents();
        return view('admin.calendars.kalender', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.calendars.form-kalender');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'category' => 'required|string|max:255',
        ]);

        CalenderEvent::create($data);

        return redirect()
            ->route('admin.kalender.index')
            ->with('success', 'Event berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalenderEvent $event)
    {
        return view('admin.calendars.form-kalender', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CalenderEvent $event)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'category' => 'required|string|max:255',
        ]);

        $event->update($data);

        return redirect()
        ->route('admin.kalender.index')
        ->with('success', 'Event berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalenderEvent $event)
    {
        $event->delete();
        return back()->with('success', 'Event berhasil dihapus');
    }
}