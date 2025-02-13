<?php

namespace Database\Factories;

use App\Models\Brands;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupEconomic>
 */
class GroupEconomicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }

    public function withBrands(int $count = 3): static
    {
        return $this->state(function (array $attributes) use ($count) {
            return [
                'brands' => Brands::factory()->count($count),
            ];
        });
    }

}
