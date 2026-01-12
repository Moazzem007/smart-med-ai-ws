<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
			'status' => $this->faker->firstName(),
			'subtotal' => $this->faker->text(),
			'discount' => $this->faker->text(),
			'tax' => $this->faker->text(),
			'grand_total' => $this->faker->text(),
        ];
    }
}
