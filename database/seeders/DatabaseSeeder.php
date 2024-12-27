<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ibrahim Issa',
            'email' => 'testing@pigeons.test',
            'password' => bcrypt('password'),
        ]);

        // Run pigeon seeder
        $this->call(PigeonSeeder::class);
        $this->call(SeasonSeeder::class);
        $this->call(PairSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(RaceSeeder::class);
        $this->call(StationSeeder::class);
    }
}
