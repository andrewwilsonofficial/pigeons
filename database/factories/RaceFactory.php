<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Race>
 */
class RaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['one-loft', 'futurity', 'club', 'combine', 'federation', 'training']),
            'date' => $this->faker->date,
            'club_name' => $this->faker->company,
            'club_number' => $this->faker->randomNumber,
            'club_location' => $this->faker->address,
            'combine_name' => $this->faker->company,
            'release_point_name' => $this->faker->city,
            'release_longitude' => $this->faker->longitude,
            'release_latitude' => $this->faker->latitude,
            'destination_point_name' => $this->faker->city,
            'destination_longitude' => $this->faker->longitude,
            'destination_latitude' => $this->faker->latitude,
            'release_temperature' => $this->faker->randomFloat(2, -10, 40),
            'release_weather' => $this->faker->word,
            'release_notes' => $this->faker->sentence,
            'destination_temperature' => $this->faker->randomFloat(2, -10, 40),
            'destination_weather' => $this->faker->word,
            'destination_notes' => $this->faker->sentence,
            'total_birds' => $this->faker->numberBetween(1, 1000),
            'total_lofts' => $this->faker->numberBetween(1, 100),
            'release_time' => $this->faker->dateTime,
        ];
    }
}
