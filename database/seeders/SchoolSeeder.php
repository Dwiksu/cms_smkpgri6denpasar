<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::insert([
            'short_name' => 'SMK PGRI 6 DENPASAR',
            'full_name' => 'Sekolah Menengah Kejuruan PGRI 6 DENPASAR',
            'address' => 'Jl. Tukad Gerinding No. 21 A Panjer, Kec. Denpasar Selatan, Kota Denpasar, Bali.',
            'phone' => '-',
            'email' => '-',
            'website' => 'https://smkpgri6denpasar.sch.id'
        ]);
    }
}