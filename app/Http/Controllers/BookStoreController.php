<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;

class BookStoreController extends Controller
{
    public function __invoke(BookStoreRequest $request)
    {
        $params = $request->validated();

        return Book::create($params);
    }
}
