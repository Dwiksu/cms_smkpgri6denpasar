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
                'value' => 0
            ]
        );
        Stat::factory()->create(
            [
                'key' => 'guru',
                'label' => 'Tenaga Pendidik',
                'value' => 0
            ]
        );
        Stat::factory()->create(
            [
                'key' => 'jurusan',
                'label' => 'Program Keahlian',
                'value' => 0
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