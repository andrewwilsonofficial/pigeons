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
            'name' => 'Admin Ibrahim',
            'email' => 'admin@app.pigeonprofile.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'User Ibrahim',
            'email' => 'user@app.pigeonprofile.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'email_verified_at' => now(),
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
