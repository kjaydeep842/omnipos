<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vendor;

class InvoiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'invoice_number' => 'INV-' . fake()->unique()->numberBetween(10000, 99999),
            'vendor_id' => Vendor::inRandomOrder()->first()->id ?? Vendor::factory(),
            'amount' => fake()->randomFloat(2, 100, 5000),
            'status' => fake()->randomElement(['Paid', 'Paid', 'Pending']),
            'date' => fake()->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
        ];
    }
}
