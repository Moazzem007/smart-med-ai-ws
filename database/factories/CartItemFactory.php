<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cart_id' => createOrRandomFactory(\App\Models\Cart::class),
			'product_id' => createOrRandomFactory(\App\Models\Product::class),
			'product_type' => $this->faker->firstName(),
			'product_name' => $this->faker->firstName(),
			'unit_price' => $this->faker->text(),
			'quantity' => $this->faker->randomNumber(),
			'line_total' => $this->faker->text(),
        ];
    }
}
