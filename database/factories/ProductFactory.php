<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(1000, 100000),
            'category_id' => 1,
            'user_id' => 1,
            'quantity' => fake()->numberBetween(1, 100),
            'image'=> fake()
                ->imageUrl(
                    640, 480, 'products', true, 'Tech'
                )
        ];
    }
}
