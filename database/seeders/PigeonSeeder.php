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
        Pigeon::factory()->count(100)->create();
    }
}
