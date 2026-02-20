<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::insert([
            'title' => 'SMK PGRI 6 DENPASAR',
            'subtitle' => 'lorem ipsum dolor sit amet',
            'tagline' => 'lorem ipsum dolor sit amet',
            'background_image' => '/storage/images/beranda/hero/hero-background.jpeg'
        ]);
    }
}
