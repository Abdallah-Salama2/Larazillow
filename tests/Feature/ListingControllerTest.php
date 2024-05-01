<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ListingControllerTest extends TestCase
{
    use RefreshDatabase; // Reset the database after each test

    public function test_store_method_creates_new_listing()
    {
        // Define the request payload (form data)
        $data = [
            'beds' => 2,
            'baths' => 2,
            'area' => 1200,
            'city' => 'New York',
            'street' => 'Example Street',
            'code' => '12345',
            'street_nr' => '123',
            'price' => 250000,
        ];

        // Send a POST request to the store route with the payload
        $response = $this->post(route('realtor.listing.store'), $data);

        // Assert that the response indicates success (status code 200 or 201)
        $response->assertStatus(200); // Or 201, depending on your implementation

        // Optionally, assert that the listing was created in the database
        $this->assertDatabaseHas('listings', $data);
    }
}
