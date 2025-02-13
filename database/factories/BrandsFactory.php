<?php

namespace Database\Factories;

use App\Models\Units;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brands>
 */
class BrandsFactory extends Factory
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

    public function withUnits(int $count = 3): static
    {
        return $this->state(function (array $attributes) use ($count) {
            return [
                'Units' => Units::factory()->count($count),
            ];
        });
    }
}
