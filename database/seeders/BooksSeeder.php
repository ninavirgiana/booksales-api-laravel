<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => 'Misteri di Balik Cermin',
                'description' => 'Novel thriller yang mengisahkan tentang seorang detektif',
                'price' => 85000.00,
                'stock' => 48,
                'cover_photo' => 'Balik_Cernin.jpg',
                'genre_id' => 1,
                'author_id' => 1
            ],
            [
                'title' => 'Petualangan di Dunia Fantasi',
                'description' => 'Buku anak-anak yang membawa pembaca ke dalam dunia penuh imaginasi',
                'price' => 95000.00,
                'stock' => 30,
                'cover_photo' => 'Dunia_Fantasi.jpg',
                'genre_id' => 2,
                'author_id' => 2
            ],
            [
                'title' => 'Resep Masakan Sehari-hari',
                'description' => 'Kumpulan resep masakan praktis dan lezat untuk keluarga',
                'price' => 75000.00,
                'stock' => 40,
                'cover_photo' => 'Masakan_Sehari.jpg',
                'genre_id' => 3,
                'author_id' => 3
            ],
            [
                'title' => 'Sejarah Peradaban Dunia',
                'description' => 'Buku ini mengupas tuntas perjalanan sejarah peradaban manusia',
                'price' => 65000.00,
                'stock' => 60,
                'cover_photo' => 'Peradaban_Dunia.jpg',
                'genre_id' => 4,
                'author_id' => 4
            ],
            [
                'title' => 'Kecerdasan Emosional dalam Kehidupan',
                'description' => 'Panduan praktis untuk mengembangkan kecerdasan emosional',
                'price' => 55000.00,
                'stock' => 19,
                'cover_photo' => 'Emosional.jpg',
                'genre_id' => 5,
                'author_id' => 5
            ]
        ];

        foreach ($books as $book) {
            Books::create($book);
        }
    }
}