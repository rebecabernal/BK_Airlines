<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flights>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "date" => $this->faker->date(),
            "origin" => $this->faker->country(),
            "arrival" => $this->faker->country(),
            "reserved" => $this->faker->boolean(),
            "status" => $this->faker->boolean(),
            "plane_id" => $this->faker->randomDigitNot(0)

        ];
    }
}
