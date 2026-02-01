<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Berita::create([
                'title' => 'Berita Terkini ' . $i,
                'slug' => 'berita-terkini-' . $i . '-' . Str::random(5),
                'content' => 'Ini adalah konten berita nomor ' . $i . '. Berita ini sangat menarik untuk dibaca.',
                'image' => null,
            ]);
        }
    }
}
