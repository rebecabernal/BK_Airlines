<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flights>
 */
class FlightsFactory extends Factory
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
            "image" => $this->faker->imageUrl(),
            "status" => $this->faker->boolean(),
            "airplane_id" => $this->faker->randomDigitNot(0)

        ];
    }
}
