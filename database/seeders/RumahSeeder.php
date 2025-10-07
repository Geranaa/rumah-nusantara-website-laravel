<?php

namespace Database\Seeders;

use App\Models\Rumah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rumah::factory()->count(200)->create();
    }
}
