<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "from" => Carbon::now(),
            "to" => Carbon::now(),
            "total" => $this->faker->randomFloat(2,100,10000),
            "daily_budget" => $this->faker->randomFloat(2,100,10000),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ];
    }
}
