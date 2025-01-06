<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pigeon>
 */
class PigeonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->name,
            'band' => $this->faker->word,
            'second_band' => $this->faker->word,
            'color_description' => $this->faker->sentence,
            'location' => $this->faker->city,
            'family' => $this->faker->randomElement(['Smith', 'Johnson', 'Williams']),
            'last_owner' => $this->faker->name,
            'rating' => $this->faker->numberBetween(0, 100),
            'color' => $this->faker->randomElement(['red', 'blue', 'green']),
            'eye' => $this->faker->randomElement(['black', 'brown', 'blue']),
            'leg' => $this->faker->word,
            'markings' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['active', 'inactive', 'lost']),
            'sex' => $this->faker->randomElement(['unknown', 'hen', 'cock']),
            'notes' => $this->faker->sentence,
            'date_hatched' => $this->faker->date,
            'cover' => 'pigeon.png',
            'is_public' => $this->faker->boolean,
        ];
    }
}
