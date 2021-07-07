<?php

namespace Tests\Feature;

use App\Models\Library;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LibraryStoreControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_create_library()
    {
        $library = Library::factory()->make();

        $params = $library->toArray();

        $response = $this->post('/libraries', $params);

        $response->assertJsonStructure([
            'name',
            'address',
        ]);

        $this->assertDatabaseHas('libraries', [
            'name' => $library->name
        ]);
    }
}
