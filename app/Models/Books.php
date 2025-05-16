<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'cover_photo',
        'genre_id',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Authors::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genres::class);
    }
}