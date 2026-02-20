<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::insert([
            'title' => 'Tentang Sekolah Kami',
            'description' => 'SMK PGRI 6 DENPASAR Adalah Lembaga Pendidikan Kejuruan Swasta Yang Berlokasi Di Jl. Tukad Gerinding No. 21 A Panjer, Kec. Denpasar Selatan, Kota Denpasar, Bali. Sekolah Ini Berada Di Bawah Naungan Kementerian Pendidikan Dan Kebudayaan Serta Yayasan Pembina Lembaga Pendidikan (Yplp) Pgri, Berfokus Pada Pendidikan Kejuruan Untuk Menyiapkan Tenaga Kerja Siap Pakai. SMK PGRI 6 Denpasar terakrediatsi A Unggul.',
            'history' => 'SMK PGRI 6 DENPASAR Adalah Lembaga Pendidikan Kejuruan Swasta Yang Berlokasi Di Jl. Tukad Gerinding No. 21 A Panjer, Kec. Denpasar Selatan, Kota Denpasar, Bali. Tahun Berdiri SMK PGRI 6 DENPASAR : 21 Mei 2009 dengan ijin operasional. SMK PGRI 6 Denpasar terakrediatsi A Unggul. Sekolah Ini Berada Di Bawah Naungan Kementerian Pendidikan Dan Kebudayaan Serta Yayasan Pembina Lembaga Pendidikan (Yplp) Pgri, Berfokus Pada Pendidikan Kejuruan Untuk Menyiapkan Tenaga Kerja Siap Pakai.',
            'vision' => 'Menghasilkan Lulusan Yang Cerdas, Profesional,Mandiri,Berkarakter, Dan Berbudaya',
            'mission' => Json::encode(
                ['Menyiapkan Tenaga Terampil Tingkat Menengah Yang Siap Kerja, Cerdas, Kreatif, Disiplin, Mandiri, Profesional, Bertanggungjawab, Beriman Dan Bertaqwa Kepada Tuhan Yang Maha Esa.', 'Menyiapkan Sumber Daya Manusia(Sdm) Yang Berkarakter, Berwawasan Wirausaha Mandiri Yang Berlandaskan Pada Budaya Dan Kearifan Lokal, Berkualitas, Inovatif, Dan Mandiri Serta Mampu Bersaing Merebut Pasar Kerja.', 'Menyiapkan Sumber Daya Manusia (Sdm) Yang Menguasai Ilmu Pengetahuan Dan Teknologi (Iptek) Yang Berwawasan Global'],
            ),
            'image' => '/storage/images/beranda/about/halaman-smk-pgri-6.jpg',
            'meta_title' => 'Tentang SMK PGRI 6 DENPASAR',
            'meta_description' => 'SMK PGRI 6 DENPASAR Adalah Lembaga Pendidikan Kejuruan Swasta Yang Berlokasi Di Jl. Tukad Gerinding No. 21 A Panjer, Kec. Denpasar Selatan, Kota Denpasar, Bali.',
        ]);
    }
}