<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorIndexController extends Controller
{
    public function __invoke()
    {
        return Author::all();
    }
}
