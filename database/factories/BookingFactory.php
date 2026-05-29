<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'room_number' => fake()->unique()->numberBetween(100, 500),
            'status' => fake()->randomElement(['available', 'occupied', 'reserved', 'maintenance']),
            'customer_name' => fake()->name(),
        ];
    }
}
