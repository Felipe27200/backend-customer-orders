<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "customer_id" => fake()->numberBetween(1, 10),
            "delivery_date" => fake()->date(),
            "delivery_address" => fake()->streetAddress(),
            "status" => fake()->randomElement(["en bodega", "empacado", "en camino", "entregando"]),
        ];
    }
}
