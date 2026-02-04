<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\GalleryAlbum; // Sesuaikan dengan Model kamu
use Carbon\Carbon;

class CleanUpOrphanImages extends Command
{
    protected $signature = 'images:cleanup';
    protected $description = 'Menghapus gambar sampah yang tidak terpakai di DB';

    public function handle()
    {
        $this->info('Memulai pembersihan gambar...');

        // 1. Ambil semua path gambar yang RESMI ada di Database
        // Kita ambil kolom thumbnail dan gallery
        $galleryAlbumCover = GalleryAlbum::pluck('cover_image')->filter()->toArray();

        // Untuk gallery (JSON), kita perlu ratakan array-nya
        // $dbGalleries = [];
        // $products = Product::whereNotNull('gallery')->get(['gallery']);
        // foreach ($products as $p) {
        //     if (is_array($p->gallery)) {
        //         $dbGalleries = array_merge($dbGalleries, $p->gallery);
        //     }
        // }

        // Gabungkan semua file yang VALID (tidak boleh dihapus)
        // Pastikan path-nya relatif (tanpa /storage/)
        $validFiles = array_merge($galleryAlbumCover);

        // Bersihkan path agar konsisten (hapus /storage/ di depan jika ada)
        $validFiles = array_map(function($path) {
            return str_replace('/storage/', '', $path);
        }, $validFiles);

        // 2. Scan folder storage (misal folder 'products')
        // Pastikan 'public' disk mencakup folder tempat upload controller kamu menyimpan file
        $allFiles = Storage::disk('public')->allFiles('images');

        $deletedCount = 0;

        foreach ($allFiles as $file) {
            // 3. Cek umur file
            // Kita hanya hapus file yang umurnya > 24 jam.
            // Tujuannya: Agar file yang BARUSAN diupload user (tapi belum klik save) TIDAK terhapus.
            $lastModified = Storage::disk('public')->lastModified($file);
            $isOld = Carbon::createFromTimestamp($lastModified)->lt(Carbon::now()->subHours(24));

            if ($isOld) {
                // 4. Cek apakah file ini ada di list VALID?
                // Kalau tidak ada di array $validFiles, berarti ini sampah.
                if (!in_array($file, $validFiles)) {
                    Storage::disk('public')->delete($file);
                    $this->info("Menghapus sampah: " . $file);
                    $deletedCount++;
                }
            }
        }

        $this->info("Selesai! Total file dihapus: $deletedCount");
    }
}
