<?php

namespace Tests\Unit\Services;

use App\Models\Book;
use App\Services\BookCreateService;
use Tests\TestCase;
use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;

class BookCreateServiceTest extends TestCase
{
    public function test_create_boook_with_isbn()
    {
        $isbn = "8538302752";

        $bypass = Bypass::serve(
            Route::ok(uri: "/books/{$isbn}", body: $this->getBody()),
        );

        $token = "teste";
        $service = new BookCreateService($token);
        $service->setBaseUrl($bypass->getBaseUrl());
        $book = $service->handle($isbn);

        $this->assertInstanceOf(Book::class, $book);
        $this->assertEquals("Uma vida com propósito", $book->name);
        $this->assertEquals(2013, $book->year);
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
