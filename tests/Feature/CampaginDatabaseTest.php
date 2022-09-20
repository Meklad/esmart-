<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CampaginDatabaseTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
        $this->artisan('db:seed');

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
        });
    }

    /**
     * A basic feature test campaigns endpoint return success form database assertion.
     *
     * @return void
     */
    public function test_campaigns_endpoint_return_success()
    {
        $response = $this->json("GET", 'api/v1/campaigns', [], []);
        $response->assertStatus(200)->assertJsonStructure([
            'data',
            "links",
            "meta"
        ]);
    }

    /**
     * A basic feature test campaigns endpoint return success form database assertion.
     *
     * @return void
     */
    public function test_create_new_campaign_endpoint_return_success()
    {
        $response = $this->json("POST", 'api/v1/campaigns', [
            "id" => 1,
            "name" => "Cathy Davis",
            "from" => "2020-09-22T05:09:00.000000Z",
            "to" => "2020-09-22T05:09:00.000000Z",
            "total" => 744,
            "daily_budget" => 8125.99
        ], []);

        $response->assertStatus(201)->assertJsonStructure([
            "data" => ["id", "name", "from", "to", "total", "daily_budget", "images"]
        ]);
    }

    public function tearDown() : void
    {
        $this->artisan('migrate:reset');
    }
}
