<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'account_type' => fake()->randomElement(['checking', 'saving']),
            'balance' => fake()->randomFloat(2, 0, 100000.0),
            'number' => fake()->unique()->numberBetween(000000,999999),
        ];
    }
}
