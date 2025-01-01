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
        $this->call(PlanSeeder::class);

        User::factory()->create([
            'name' => 'Ibrahim Issa',
            'email' => 'testing@pigeons.test',
            'password' => bcrypt('password'),
        ]);

        $this->call(PigeonSeeder::class);
        $this->call(SeasonSeeder::class);
        $this->call(PairSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(RaceSeeder::class);
        $this->call(StationSeeder::class);
        $this->call(PaymentMethodSeeder::class);
    }
}
