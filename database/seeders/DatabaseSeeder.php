<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\CD;
use App\Models\FYP;
use App\Models\Jurnal;
use App\Models\Newspapers;
use App\Models\Profile;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);  

        // \App\Models\User::factory()->create([
        //     'name' => 'Tobiichi Origami',
        //     'email' => 'TobiichiOrigami@DateALive.com',
        //     'password' => Hash::make('password'),
        // ]);  

        // Profile::factory()->create([
        //     'name' => 'Tobiichi Origami',
        //     'username' => 'Origami',
        //     'email' => 'TobiichiOrigami@DateALive.com',
        // ]);

        Profile::create([
            'name' => 'Tobiichi Origami',
            'username' => 'Origami',
            'email' => 'TobiichiOrigami@DateALive.com',

        ]);

        User::create([
            'name' => 'Origami',
            'email' => 'TobiichiOrigami@DateALive.com',
            'password' => Hash::make('PasswordItuApa'),
        ]);

        Book::create([
            'Judul_Buku' => 'Significant Zero: Heroes, Villains, and the Fight for Art and Soul in Video Games',
            'Penulis' => 'Walt Williams',
            'Penerbit' => 'Atria Books', 
            'Sinopsis' => 'Buku ini menceritakan perjalanan penulis dalam industri video game, termasuk tantangan kreatif dan korporat di balik layar pengembangan game terkenal.',
            'Tahun_Terbit' => \Carbon\Carbon::createFromFormat('Y-m-d', '2017-09-19'), 
        ]);
        

        Jurnal::create([
            'Judul_Jurnal' => 'Metodologi Pengembangan Game Berbasis Pendidikan dengan Unity',
            'Penulis' => 'Siti Nurhaliza',
            'Penerbit' => 'Jurnal Rekayasa Perangkat Lunak',
            'Deskripsi' => 'Jurnal ini membahas proses pengembangan game berbasis pendidikan menggunakan engine Unity. Pembahasan mencakup tahap perancangan, implementasi, hingga pengujian untuk memastikan pengalaman pengguna yang optimal.',
            'Tahun_Terbit' => \Carbon\Carbon::createFromFormat('Y-m-d', '2024-05-15'),
        ]);
        
        FYP::create([
            'Judul_FYP' => 'Pengembangan Game Edukasi Menggunakan Unity',
            'Isi' => 'Proyek ini bertujuan untuk mengembangkan sebuah game edukasi berbasis Unity yang dapat membantu siswa dalam memahami konsep-konsep matematika dasar.',
            'Tahun_Terbit' => \Carbon\Carbon::createFromFormat('Y-m-d', '2024-06-15'),
        ]);
        

        CD::create([
            'Judul_CD' => 'The Best of Electronic Music',
            'Genre' => 'Electronic, EDM',
            'Tahun_Terbit' => \Carbon\Carbon::createFromFormat('Y-m-d', '2023-12-01'),
        ]);
        

        Newspapers::create([
            'Judul_Newspapers' => 'Teknologi Terbaru Mengubah Industri Permainan',
            'Isi' => 'Artikel ini membahas dampak teknologi terbaru, seperti kecerdasan buatan dan VR, terhadap industri permainan. Teknologi-teknologi ini membuka potensi baru dalam pengalaman bermain game yang lebih realistis dan interaktif.',
            'Tahun_Terbit' => \Carbon\Carbon::createFromFormat('Y-m-d', '2024-11-01'),
        ]);
        
        
    }
}
