<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VendorFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->company();
        return [
            'name' => $name,
            'type' => fake()->randomElement(['Restaurant POS', 'Hotel Billing', 'Bus Booking', 'Hospital Billing']),
            'status' => fake()->randomElement(['active', 'active', 'active', 'warning', 'inactive']),
            'initials' => strtoupper(substr($name, 0, 2)),
            'total_revenue' => fake()->randomFloat(2, 5000, 500000),
            'active_users' => fake()->numberBetween(10, 500),
            'commission' => fake()->randomElement(['2.5%', '3.0%', '1.5%', '5.0%']),
        ];
    }
}
