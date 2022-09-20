<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Campaign::factory(10)->create()->each(function($campaign) {
            $campaign->addMedia(public_path("seeding_images/rastau_1.jpg"))
            ->preservingOriginal()
            ->toMediaCollection("campaign");
            $campaign->addMedia(public_path("seeding_images/rastau_2.jpg"))
            ->preservingOriginal()
            ->toMediaCollection("campaign");
            $campaign->addMedia(public_path("seeding_images/rastau_3.jpg"))
            ->preservingOriginal()
            ->toMediaCollection("campaign");
        });
    }
}
