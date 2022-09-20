<?php

namespace Tests\Feature;

use App\Models\Campaign;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CampaginDatabaseTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Setup database connection and run migration and seed.
     *
     * @return void
     */
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
            'data', "links", "meta"
        ]);
    }

    /**
     * A basic feature test create campaign endpoint return success form database assertion.
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

    /**
     * A basic feature test get campaign by id endpoint return success form database assertion.
     *
     * @return void
     */
    public function test_get_campaign_by_id_endpoint_return_success()
    {
        $campaign = Campaign::first();

        $response = $this->json("GET", "api/v1/campaigns/$campaign->id", [], []);
        $response->assertStatus(200)->assertJsonStructure([
            "data" => ["id", "name", "from", "to", "total", "daily_budget", "images"]
        ]);
    }

    /**
     * A basic feature test update campaign endpoint return success form database assertion.
     *
     * @return void
     */
    public function test_update_new_campaign_endpoint_return_success()
    {
        $campaign = Campaign::first();

        $response = $this->json("POST", "api/v1/campaigns/$campaign->id", [
            "name" => "Cathy Davis",
            "from" => "2020-09-22T05:09:00.000000Z",
            "to" => "2020-09-22T05:09:00.000000Z",
            "total" => 744,
            "daily_budget" => 8125.99
        ], []);

        $response->assertStatus(200)->assertJsonStructure([
            "data" => ["id", "name", "from", "to", "total", "daily_budget", "images"]
        ]);
    }

    /**
     * A basic feature test delete campaign by id endpoint return success form database assertion.
     *
     * @return void
     */
    public function test_delete_campaign_by_id_endpoint_return_success()
    {
        $campaign = Campaign::first();

        $response = $this->json("DELETE", "api/v1/campaigns/$campaign->id", [], []);
        $response->assertStatus(200)->assertJsonStructure([
            "data" => ["id", "name", "from", "to", "total", "daily_budget", "images"]
        ]);
    }

    /**
     * A basic feature test delete images assossiated to campaign endpoint return success form database assertion.
     *
     * @return void
     */
    public function test_delete_images_assossiated_to_campaign_endpoint_return_success()
    {
        $campaign = Campaign::first();

        $response = $this->json("DELETE", "api/v1/campaigns/delete-capmaign-images/$campaign->id", [
            "images" => [3]
        ], []);
        $response->assertStatus(200)->assertJsonStructure([
            "data" => ["id", "name", "from", "to", "total", "daily_budget", "images"]
        ]);
    }

    /**
     * Reset database after finishing the test
     *
     * @return void
     */
    public function tearDown() : void
    {
        $this->artisan('migrate:reset');
    }
}
