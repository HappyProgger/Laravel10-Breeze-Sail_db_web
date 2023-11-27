<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $clients = Client::factory()->count(10)->create();
//        $cars = Car::factory()->count(25)->create();
//        $clients->each(function ($client) use ($cars) {
//            $client->cars()->attach(
//                $cars->random(rand(1, 3))->pluck('id')->toArray()
//            );
//        });
        $clients = Client::factory()->count(10)->create()->each(function ($client) {
        $client->cars()->saveMany(
            Car::factory()->count(rand(1,3))->make()
        );
    });
    }
}
