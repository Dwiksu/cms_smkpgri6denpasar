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
            'email' => 'smkpgri.enam@yahoo.co.id',
            'office_phone' => '08113860660',
            'website' => 'https://smkpgri6denpasar.sch.id',
            'facebook' => 'https://www.facebook.com/sadgriska.jaya.3?mibextid=ZbWKwL',
            'instagram' => 'https://www.instagram.com/sadgriska',
            'youtube' => 'https://www.youtube.com/@smkpgri6denpasar911',
            'tiktok' => 'https://www.tiktok.com/@sadgriska_dps',
            'whatsapp_phone' => '+62 821-4639-0517',
        ]);
    }
}