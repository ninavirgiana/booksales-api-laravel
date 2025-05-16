<?php

namespace Database\Seeders;

use App\Models\Authors;
use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    public function run()
    {
        $authors = [
            [
                'name' => 'Stephen King',
                'photo' => 'stephen_king.jpg',
                'bio' => 'Monsters are real, and ghosts are real too. They live inside us'
            ],
            [
                'name' => 'Tere Liye',
                'photo' => 'tere_liye.jpg',
                'bio' => 'Everything is possible. The impossible just takes longer'
            ],
            [
                'name' => 'William Shakespeare',
                'photo' => 'william_shakespeare.jpg',
                'bio' => 'To be, or not to be: that is the question'
            ],
            [
                'name' => 'Mark Manson',
                'photo' => 'mark_manson.jpg',
                'bio' => 'You are not special. But you can be better'
            ],
            [
                'name' => 'Andrea Hirata',
                'photo' => 'andrea_hirata.jpg',
                'bio' => 'Hidup adalah serangkaian kesempatan untuk membuat kisah terbaik'
            ]
        ];

        foreach ($authors as $author) {
            Authors::create($author);
        }
    }
}