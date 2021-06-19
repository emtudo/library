<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Book;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BookCreateService
{
    protected $baseUrl = "https://api2.isbndb.com";

    public function __construct(protected string $token)
    {
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function handle(string $isbn)
    {
        $params = $this->getBookFromApi($isbn);

        return DB::transaction(function () use ($params) {
            $authors = $params['authors'];
            $author = $authors[0];

            $author = Author::create(['name' => $author]);

            $year = Carbon::parse($params['date_published'])->format('Y');

            $data = [
                'name' => $params['title'],
                'author_id' => $author->id,
                'year' => $year,
            ];

            return Book::create($data);
        });
    }

    protected function getBookFromApi(string $isbn)
    {
        $url = "{$this->baseUrl}/books/${isbn}";
        $response = Http::withToken($this->token)
            ->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        throw new Exception('Livro não encontrado ou não autenticado.');
    }
}
