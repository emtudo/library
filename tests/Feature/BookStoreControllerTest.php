<?php

namespace Tests\Feature;

use App\Services\BookCreateService;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;

class BookStoreControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_create_book_with_params()
    {
        $author = Author::factory()->create();


        $params = Book::factory()->make()->toArray();
        $params['author_id'] = $author->id;

        $response = $this->post('books', $params);

        $response->assertJsonStructure([
            'name',
            'year',
            'author_id',
        ]);
    }

      /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_create_book_with_isbn()
    {
        $isbn = "8538302752";

        $this->instance(BookCreateService::class, $this->getService($isbn));

        $response = $this->post("/books", [
            'isbn' => $isbn,
        ]);

        $response->assertJsonStructure([
            'name',
            'year',
            'author_id',
        ]);
    }

    protected function getService(string $isbn)
    {
        $bypass = Bypass::serve(
            Route::ok(uri: "/books/{$isbn}", body: $this->getBody()),
        );

        $token = "teste";
        $service = new BookCreateService($token);
        $service->setBaseUrl($bypass->getBaseUrl());

        return $service;
    }

    protected function getBody()
    {
        return [
            "title" => "Uma vida com propósito",
            "title_long" => "Uma vida com propósito. Por que eu estou na Terra?",
            "isbn" => "8538302752",
            "isbn13" => "9788538302759",
            "dewey_decimal" => "string",
            "binding" => "string",
            "publisher" => "string",
            "language" => "string",
            "date_published" => "2013-05-01T16:31:10.532Z",
            "edition" => "string",
            "pages" => 0,
            "dimensions" => "string",
            "overview" => "string",
            "image" => "string",
            "msrp" => 0,
            "excerpt" => "string",
            "synopsys" => "string",
            "authors" => [
              "Rick Warren"
            ],
            "subjects" => [
              "string"
            ],
            "reviews" => [
              "string"
            ],
            "prices" => [
              [
                "condition" => "string",
                "merchant" => "string",
                "merchant_logo" => "string",
                "merchant_logo_offset" => [
                  "x" => "string",
                  "y" => "string"
                ],
                "shipping" => "string",
                "price" => "string",
                "total" => "string",
                "link" => "string"
              ]
            ],
            "related" => [
              "type" => "string"
            ]
        ];
    }
}
