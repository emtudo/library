<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    public $fillable = [
        'author_id',
        'name',
        'year',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
