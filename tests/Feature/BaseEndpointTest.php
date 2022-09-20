<?php

namespace Tests\Feature;

use Tests\TestCase;

class BaseEndpointTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_api_endpoint_returns_a_successful_response()
    {
        $response = $this->get("api/v1/");

        $response->assertStatus(200);
    }
}
