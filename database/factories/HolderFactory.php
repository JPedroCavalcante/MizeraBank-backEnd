<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Holder>
 */
class HolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'identifier' => fake()->unique()->numberBetween('000000000', '999999999'),
            'birth_date' => fake()->date('Y-m-d', now()),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
