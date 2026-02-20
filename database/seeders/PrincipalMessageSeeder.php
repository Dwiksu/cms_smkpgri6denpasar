<?php

namespace Database\Seeders;

use App\Models\PrincipalMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrincipalMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrincipalMessage::insert([
           'name' => 'Drs. I Wayan Sukarta',
           'photo' => '/storage/images/beranda/principal/foto-kepsek.jpeg',
           'message' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. dolor sit amet consectetur adipisicing elit. Quisquam, quae. ',
        ]);
    }
}