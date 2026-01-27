<?php

namespace Database\Seeders;

use App\Models\Galleries;
use App\Models\GalleryPhotos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryPhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryPhotos::factory(10)->recycle([
            Galleries::all()
        ])->create();
    }
}