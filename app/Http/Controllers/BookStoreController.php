<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use App\Services\BookCreateService;

class BookStoreController extends Controller
{
    public function __invoke(BookStoreRequest $request, BookCreateService $service)
    {
        $isbn = $request->input('isbn', null);

        if ($isbn) {
            return $service->handle($isbn);
        }
        $params = $request->validated();

        return Book::create($params);
    }
}
