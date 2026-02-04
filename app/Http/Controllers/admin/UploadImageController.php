<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,webp,avif|max:5120', // Maks 5MB
            'folder' => 'nullable|string'
        ]);

        if ($request->hasFile('file')) {
            $folder = $request->input('folder', 'uploads');
            // Simpan ke disk 'public'
            $path = $request->file('file')->store('images/' . $folder, 'public');

            return response()->json([
                'url' => Storage::url($path), // Pastikan sudah php artisan storage:link
                'path' => $path
            ]);
        }

        return response()->json(['error' => 'File not found'], 400);
    }
}
