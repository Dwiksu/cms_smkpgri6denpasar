<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::getMajor();
        return view('admin.majors.jurusan', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.majors.form-jurusan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'short_name' => 'required|string|max:100',
            'full_description' => 'required|string',
            'image' => 'required|string',
            'gallery' => 'nullable|array',
            'subjects' => 'required|array|min:1',
            'subjects.*.name' => 'required|string|min:3',
            'subjects.*.description' => 'required|string|min:5',
            'careers' => 'nullable|array',
            'achievements' => 'nullable|array',
        ], [
            'name.required' => 'Nama jurusan harus diisi',
            'description.required' => 'Deskripsi jurusan harus diisi',
            'short_name.required' => 'Singkatan jurusan harus diisi',
            'full_description.required' => 'Deskripsi lengkap jurusan harus diisi',
            'image.required' => 'Gambar jurusan harus diisi',
            'subjects.required' => 'Jurusan harus memiliki beberapa mata pelajaran',
            'subjects.min' => 'Minimal harus ada 1 mata pelajaran',
            'subjects.*.name.required' => 'Nama mata pelajaran harus diisi',
            'subjects.*.name.min' => 'Minimal harus ada 3 huruf',
            'subjects.*.description.required' => 'Deskripsi mata pelajaran harus diisi',
            'subjects.*.description.min' => 'Minimal harus ada 5 huruf',
        ]);

        $data['slug'] = str()->slug($data['name']);

        Major::create($data);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
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
    public function edit(Major $major)
    {
        return view('admin.majors.form-jurusan', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'short_name' => 'required|string|max:100',
            'full_description' => 'required|string',
            'image' => 'required|string',
            'gallery' => 'nullable|array',
            'subjects' => 'required|array|min:1',
            'subjects.*.name' => 'required|string|min:3',
            'subjects.*.description' => 'required|string|min:5',
            'careers' => 'nullable|array',
            'achievements' => 'nullable|array',
        ], [
            'name.required' => 'Nama jurusan harus diisi',
            'description.required' => 'Deskripsi jurusan harus diisi',
            'short_name.required' => 'Singkatan jurusan harus diisi',
            'full_description.required' => 'Deskripsi lengkap jurusan harus diisi',
            'image.required' => 'Gambar jurusan harus diisi',
            'subjects.required' => 'Jurusan harus memiliki beberapa mata pelajaran',
            'subjects.min' => 'Minimal harus ada 1 mata pelajaran',
            'subjects.*.name.required' => 'Nama mata pelajaran harus diisi',
            'subjects.*.name.min' => 'Minimal harus ada 3 huruf',
            'subjects.*.description.required' => 'Deskripsi mata pelajaran harus diisi',
            'subjects.*.description.min' => 'Minimal harus ada 5 huruf',
        ]);

        $data['slug'] = str()->slug($data['name']);

        $major->update($data);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil dihapus');
    }
}