<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 5);

        $teachers = Teacher::when($request->search, function ($q) use ($request) {
            $q->where('name', 'like', "%{$request->search}%")->orWhere('subject', 'like', "%{$request->search}%");
        })
            ->with('major')
            ->latest()
            ->paginate($perPage);

        return $request->ajax()
            ? response()->json($teachers)
            : view('admin.teachers.profil-guru', compact('teachers'));
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
            'position' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'major_id' => 'nullable|exists:majors,id',
        ], [
            'name.required' => 'Nama guru harus diisi',
            'position.required' => 'Posisi guru harus diisi',
            'photo.required' => 'Foto guru harus diisi',
        ]);

        Teacher::create($data);

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
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
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
            'position' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'major_id' => 'nullable|exists:majors,id',
            'photo' => 'required|string',
        ], [
            'name.required' => 'Nama guru harus diisi',
            'position.required' => 'Posisi guru harus diisi',
            'photo.required' => 'Foto guru harus diisi',
        ]);

        $teacher->update($data);

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        if($teacher->photo) {
            Storage::disk('public')->delete($teacher->photo);
        }
        $teacher->delete();
        return response()->json([
            'success' => true,
            'message' => 'Profil Guru berhasil dihapus'
        ]);
    }
}