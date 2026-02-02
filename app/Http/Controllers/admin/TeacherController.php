<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('admin.teachers.profil-guru', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.form-profil-guru');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:18',
            'position' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'major' => 'required|string|max:255',
            'photo' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:18',
            'education' => 'required|string|max:100',
        ]);

        try {
            Teacher::create($data);
        } catch (\Throwable $e) {
            // gagal
            dd($e->getMessage());
        }


        return back()->with('success', 'Guru berhasil ditambahkan');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:18',
            'position' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'major' => 'required|string|max:255',
            'photo' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:18',
            'education' => 'required|string|max:100',
        ]);

        $teacher->update($data);

        return back()->with('success', 'Guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return back()->with('success', 'Guru berhasil dihapus');
    }
}
