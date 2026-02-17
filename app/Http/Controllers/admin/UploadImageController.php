<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UploadImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp,avif|max:5120',
            'folder' => 'nullable|string'
        ]);

        if ($request->hasFile('file')) {
            try {
                $file = $request->file('file');
                $folder = $request->input('folder', 'uploads');

                // 1. Buat Nama File Baru dengan akhiran .webp
                // Kita pakai random string + timestamp agar unik
                $filename = time() . '-' . Str::random(10) . '.webp';
                $path = $folder . '/' . $filename;

                // 2. Proses Konversi Menggunakan Intervention Image
                // Baca file asli -> Ubah ke WebP -> Kualitas 80% (Bisa diatur 1-100)
                $manager = new ImageManager(new Driver());
                $encoded = $manager->read($file)
                    ->toWebp(80);

                // 3. Simpan File WebP ke Storage Public
                Storage::disk('public')->put($path, $encoded);

                return response()->json([
                    'url' => Storage::url($path), // URL gambar webp
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName()
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => 'Gagal memproses gambar: ' . $e->getMessage()
                ], 500);
            }
        }

        return response()->json(['error' => 'File not found'], 400);
    }
}
