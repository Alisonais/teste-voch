<?php

namespace Database\Seeders;

use App\Models\GroupEconomic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupEconomicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupEconomic::factory()->count(10)->create();
    }
}
