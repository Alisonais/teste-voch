<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Units>
 */
class UnitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trade_name' => fake()->name(),
            'corporate_name' => fake()->name(),
            'cnpj' => $this->faker->numberBetween(10000000000000,99999999999999),
        ];
    }

    public function withEmployers(int $count = 3): static
    {
        return $this->state(function (array $attributes) use ($count) {
            return [
                'Employers' => Employer::factory()->count($count),
            ];
        });
    }
}
