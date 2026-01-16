<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => createOrRandomFactory(\App\Models\User::class),
			'order_no' => $this->faker->firstName(),
			'status' => $this->faker->firstName(),
			'subtotal' => $this->faker->text(),
			'discount' => $this->faker->text(),
			'tax' => $this->faker->text(),
			'grand_total' => $this->faker->text(),
			'payment_status' => $this->faker->firstName(),
        ];
    }
}
