<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
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
            'email' => fake()->email(),
            'check_in' => fake()->dateTimeBetween('+1 day', '+1 week')->format('Y-m-d'),
            'check_out' => fake()->dateTimeBetween('+1 week', '+2 weeks')->format('Y-m-d'),
        ];
    }
}
