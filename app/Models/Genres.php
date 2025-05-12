<?php

namespace App\Models;

class Genres
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'name' => 'Thriller',
                'description' => 'Fokus pada teka-teki atau kejahatan yang harus dipecahkan'
            ],
            [
                'id' => 2,
                'name' => 'Dystopian',
                'description' => 'Gambaran dunia masa depan yang suram dan otoriter'
            ],
            [
                'id' => 3,
                'name' => 'Sastra Klasik',
                'description' => 'Buku dengan nilai sastra tinggi yang sering dianggap abadi'
            ],
            [
                'id' => 4,
                'name' => 'Romansa',
                'description' => 'Kisah percintaan dengan konflik emosional'
            ],
            [
                'id' => 5,
                'name' => 'Historical Fiction',
                'description' => 'Kisah fiksi berlatar sejarah'
            ]
        ];
    }
}