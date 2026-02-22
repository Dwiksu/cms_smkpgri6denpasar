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
            'subtitle' => 'Cerdas, Profesional, Mandiri, Berkarakter, dan Berbudaya',
            'tagline' => 'SADGRISKA JAYA',
            'background_image' => '/storage/images/beranda/hero/hero-background.jpeg'
        ]);
    }
}