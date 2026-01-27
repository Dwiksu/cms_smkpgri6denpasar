<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'test@example.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        $this->call([
            CategoriesSeeder::class,
            GalleriesSeeder::class,
            GalleryPhotosSeeder::class,
            PostsSeeder::class,
            PagesSeeder::class,
            SettingsSeeder::class
        ]);
    }
}