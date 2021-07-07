<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryStoreRequest;
use App\Models\Library;

class LibraryStoreController extends Controller
{
    public function __invoke(LibraryStoreRequest $request)
    {
        $data = $request->validated();

        return Library::create($data);
    }
}
