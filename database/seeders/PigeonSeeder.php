<?php

namespace Database\Seeders;

use App\Models\Pigeon;
use Illuminate\Database\Seeder;

class PigeonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            Pigeon::factory()->create();
        }
    }
}
