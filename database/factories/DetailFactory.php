<?php

namespace Database\Factories;

use App\Models\Detail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail>
 */
class DetailFactory extends Factory
{
    protected $model = Detail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "order_id" => fake()->numberBetween(1, 100),
            "product_id" => fake()->numberBetween(1, 10),
            "quantity" => fake()->numberBetween(1, 1000),
        ];
    }
}
