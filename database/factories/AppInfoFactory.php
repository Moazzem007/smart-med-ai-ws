<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppInfoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'platform' => $this->faker->firstName(),
			'current_version' => $this->faker->firstName(),
			'minimum_version' => $this->faker->firstName(),
			'maintenance_mode' => $this->faker->boolean(),
			'maintenance_message' => $this->faker->text(),
			'force_update' => $this->faker->boolean(),
			'active' => $this->faker->boolean(),
        ];
    }
}
