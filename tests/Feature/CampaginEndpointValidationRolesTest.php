<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Campaign;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CampaginEndpointValidationRolesTest extends TestCase
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
     * A basic feature test create campaign endpoint return success form database assertion.
     *
     * @return void
     */
    public function test_create_new_campaign_endpoint_return_success()
    {
        $response = $this->json("POST", 'api/v1/campaigns', [], []);
        $response->assertStatus(422)->assertJsonStructure(["message", "errors"]);
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
            "from" => "Not A Date",
            "to" => "Not A Date",
        ], []);
        $response->assertStatus(422)->assertJsonStructure(["message", "errors"]);
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
