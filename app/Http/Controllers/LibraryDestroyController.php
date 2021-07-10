<?php

namespace App\Http\Controllers;

use App\Models\Library;

class LibraryDestroyController extends Controller
{
    public function __invoke(Library $library)
    {
        return $library->delete();
    }
}
