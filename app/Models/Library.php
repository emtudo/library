<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'address',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
