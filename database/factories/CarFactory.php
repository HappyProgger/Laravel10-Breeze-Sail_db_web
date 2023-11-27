<?php

namespace Database\Factories;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brand = ['audi','bmw','ford', 'honda', 'lada'];

//        $client = Client::all();
        return [
//        'client_id' =>           ,
        'brand' => fake()->word,
        'model' =>   $brand[rand(0,count($brand)-1)],
        'body_color' =>         fake()->colorName() ,
            'license_plate' =>  fake()->unique()->randomFloat(999)     ,
        'is_parked' =>      fake()->boolean,
        ];
    }
}
