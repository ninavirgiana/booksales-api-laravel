<?php

namespace Database\Seeders;

use App\Models\Genres;
use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    
    public function run()
    {
        $genres = [
            [
                'name' => 'Thriller',
                'description' => 'Fokus pada teka-teki atau kejahatan yang harus dipecahkan'
            ],
            [
                'name' => 'Dystopian',
                'description' => 'Gambaran dunia masa depan yang suram dan otoriter'
            ],
            [
                'name' => 'Sastra Klasik',
                'description' => 'Buku dengan nilai sastra tinggi yang sering dianggap abadi'
            ],
            [
                'name' => 'Romansa',
                'description' => 'Kisah percintaan dengan konflik emosional'
            ],
            [
                'name' => 'Historical Fiction',
                'description' => 'Kisah fiksi berlatar sejarah'
            ]
        ];

        foreach ($genres as $genre) {
            Genres::create($genre);
        }
    }
}