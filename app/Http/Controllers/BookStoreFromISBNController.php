<?php

namespace App\Http\Controllers;

use App\Services\BookCreateService;

class BookStoreFromISBNController extends Controller
{
    public function __invoke(string $isbn, BookCreateService $service)
    {
        return $service->handle($isbn);
    }
}
