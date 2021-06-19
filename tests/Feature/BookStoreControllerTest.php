<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookStoreControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_create_book()
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
}
