<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stat::factory()->create(
            [
                'key' => 'siswa',
                'label' => 'Siswa Aktif',
                'value' => 204
            ]
        );
        Stat::factory()->create(
            [
                'key' => 'ptk',
                'label' => 'Guru & Tenaga Pendidik',
                'value' => 13
            ]
        );
        Stat::factory()->create(
            [
                'key' => 'jurusan',
                'label' => 'Program Keahlian',
                'value' => 4
            ]
        );
        Stat::factory()->create(
            [
                'key' => 'mitra',
                'label' => 'Mitra Industri',
                'value' => 0
            ]
        );
    }
}