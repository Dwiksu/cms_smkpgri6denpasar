<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::insert([
            [
                'name' => 'Teknik Sepeda Motor',
                'slug' => 'teknik-sepeda-motor',
                'short_name' => 'TSM',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
                'full_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
                'image' => '-',
            ],
            [
                'name' => 'Teknik Kendaraan Ringan',
                'slug' => 'teknik-kendaraan-ringan',
                'short_name' => 'TKR',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
                'full_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
                'image' => '-',
            ],
            [
                'name' => 'Desain Komunikasi Visual',
                'slug' => 'desain-komunikasi-visual',
                'short_name' => 'DKV',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
                'full_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
                'image' => '-',
            ],
            [
                'name' => 'Perhotelan',
                'slug' => 'perhotelan',
                'short_name' => 'PERHOTELAN',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
                'full_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
                'image' => '-',
            ]
        ]);


    }
}