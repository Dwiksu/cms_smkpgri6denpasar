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

    public function getEvents()
    {
        $events = CalenderEvent::all()->map(function ($e) {
            return [
                'id'            => $e->id,
                'title'         => $e->title,
                'start'         => $e->start_date,
                'end'           => $e->end_date,
                'allDay'        => true,
                'description'   => $e->description,
                'category'      => $e->category,
                'color'         => match ($e->category) {
                    'libur' => '#efb100',
                    'ujian' => '#fb2c36',
                    'akademik' => '#1447e6',
                    'kegiatan' => '#00c951',
                    default => '#2563eb',
                }
            ];
        });

        return response()->json($events);
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
        ], [
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'start_date.required' => 'Tanggal mulai harus diisi',
            'end_date.required' => 'Tanggal selesai harus diisi',
            'category.required' => 'Kategori harus diisi',
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
        ], [
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'start_date.required' => 'Tanggal mulai harus diisi',
            'end_date.required' => 'Tanggal selesai harus diisi',
            'category.required' => 'Kategori harus diisi',
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
        return response()->json([
            'success' => true,
            'message' => 'Event berhasil dihapus'
        ]);
    }
}
