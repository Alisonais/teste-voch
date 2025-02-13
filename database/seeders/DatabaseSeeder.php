<?php

namespace Database\Seeders;

use App\Models\Brands;
use App\Models\Employer;
use App\Models\GroupEconomic;
use App\Models\Units;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        GroupEconomic::factory(5)->has(
            Brands::factory()->count(2)->has(
            Units::factory(2)->has(
            Employer::factory(3)
            )))->create();
    }
}
