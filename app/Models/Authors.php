<?php

namespace App\Models;

class Authors
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'name' => 'Stephen King',
                'photo' => 'stephen.jpg',
                'bio' => 'Monsters are real, and ghosts are real too. They live inside us'
            ],
            [
                'id' => 2,
                'name' => 'Tere Liye',
                'photo' => 'tere.jpg',
                'bio' => 'Everything is possible. The impossible just takes longer'
            ],
            [
                'id' => 3,
                'name' => 'William Shakespeare',
                'photo' => 'william.jpg',
                'bio' => 'To be, or not to be: that is the question'
            ],
            [
                'id' => 4,
                'name' => 'Mark Manson',
                'photo' => 'mark.jpg',
                'bio' => 'You are not special. But you can be better'
            ],
            [
                'id' => 5,
                'name' => 'Andrea Hirata',
                'photo' => 'andrea.jpg',
                'bio' => 'Hidup adalah serangkaian kesempatan untuk membuat kisah terbaik'
            ]
        ];
    }
}