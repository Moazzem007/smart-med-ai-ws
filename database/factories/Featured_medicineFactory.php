<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Featured_medicineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->text(),
			'user_id' => createOrRandomFactory(\App\Models\User::class),
			'medicine_id' => createOrRandomFactory(\App\Models\Medicine::class),
			'sort_order' => $this->faker->randomNumber(),
			'active' => $this->faker->boolean(),
			'created_at' => $this->faker->dateTime(),
			'updated_at' => $this->faker->dateTime(),
        ];
    }
}
