<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create([
            'site_name' => 'SMK PGRI 6 DENPASAR',
            'logo' => 'logo.png',
            'address' => 'JL. TUKAD GERINDING NO.21 A PANJER DENPASAR',
            'phone' => '0854848954959454',
            'email' => 'smkpgri.enam@yahoo.co.id',
            'facebook' => 'https://www.facebook.com/SmkPgri6Denpasar/',
            'instagram' => 'https://www.instagram.com/sadgriska/',
            'meta_title' => 'SMK PGRI 6 DENPASAR',
            'meta_description' => 'SMKS PGRI 6 DENPASAR merupakan salah satu sekolah jenjang SMK berstatus Swasta yang berada di wilayah Kec. Denpasar Selatan, Kota Denpasar, Bali. ',
        ]);
    }
}