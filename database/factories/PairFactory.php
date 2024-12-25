<?php

namespace Database\Factories;

use App\Models\Pigeon;
use App\Models\Season;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pair>
 */
class PairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cocks = Pigeon::where('sex', 'cock')->get();
        $hens = Pigeon::where('sex', 'hen')->get();
        $seasons = Season::all();

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'date_paired' => $this->faker->date(),
            'cock_id' => $cocks->random()->id,
            'hen_id' => $hens->random()->id,
            'season_id' => $seasons->random()->id
        ];
    }
}
