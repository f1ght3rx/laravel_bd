<?php

namespace Database\Factories;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Factories\Factory;


class ReportFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'number' => $faker->numerify('aaa-###'),
            'description'=> $faker->paragraph,
            'created_at' => $faker->dateTimeBetween('-1 Week','now'),
            'status_id' => 1
        ];
    }
}
