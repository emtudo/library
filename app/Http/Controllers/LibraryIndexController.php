<?php

namespace App\Http\Controllers;

use App\Models\Library;

class LibraryIndexController extends Controller
{
    public function __invoke()
    {
        return Library::all();
    }
}
