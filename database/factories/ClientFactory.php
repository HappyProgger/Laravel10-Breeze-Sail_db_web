<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = ['male', 'female'];
        return [
        'full_name' => fake()->userName(),
        'gender' => $gender[rand(0,count($gender)-1)],
        'phone' => fake()->phoneNumber(),
        'address' => fake()->address()
        ];
    }
}
