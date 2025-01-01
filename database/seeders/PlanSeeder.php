<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            ['name' => 'Free trail', 'description' => '3 days trial', 'duration' => 3, 'price' => 0],
            ['name' => '1 Year', 'description' => 'Buy a year of our Premium Service and have all features available to you, including new ones as they are added.', 'duration' => 365, 'price' => 19],
            ['name' => '2 Years', 'description' => 'Two years of Premium Service for your convenience.', 'duration' => 730, 'price' => 38],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
