<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::getTeacher();
        return view('admin.teachers.profil-guru', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::getMajorForTeacherForm();
        return view('admin.teachers.form-profil-guru', compact('majors'));
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
            'major_id' => 'nullable|exists:majors,id',
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


        return redirect()->route('admin.profil.index')->with('success', 'Guru berhasil ditambahkan');
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
    public function edit(Teacher $teacher)
    {
        $majors = Major::getMajorForTeacherForm();
        return view('admin.teachers.form-profil-guru', compact('teacher', 'majors')); 
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
            'major_id' => 'nullable|exists:majors,id',
            'photo' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:18',
            'education' => 'required|string|max:100',
        ]);

        $teacher->update($data);

        return redirect()
        ->route('admin.profil.index')
        ->with('success', 'Guru berhasil diubah');
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
