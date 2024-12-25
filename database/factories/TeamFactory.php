<?php

namespace Database\Factories;

use App\Models\Pigeon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pigeons = Pigeon::inRandomOrder()->limit(3)->get()->pluck('id')->toJson();

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'pigeons' => $pigeons,
        ];
    }
}
