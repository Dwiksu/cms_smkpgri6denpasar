<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pengaturan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'old_password' => 'required|string',
            'password' => 'required|string|min:4|confirmed',
        ]);

        if (!Hash::check($data['old_password'], $user->password)) {
            return back()->with('error', 'Password lama tidak sesuai');
        }

        if ($data['password'] ===  $data['old_password']) {
            return back()->with('error', 'Password baru tidak boleh sama dengan password lama');
        }

        $user->update([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        return back()->with('success', 'Pengaturan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
