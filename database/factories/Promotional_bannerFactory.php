<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Promotional_bannerFactory extends Factory
{
    public function definition(): array
    {
        return [
			'title' => $this->faker->firstName(),
			'image_path' => $this->faker->firstName(),
			'link_url' => $this->faker->firstName(),
			'position' => $this->faker->firstName(),
			'sort_order' => $this->faker->randomNumber(),
			'start_date' => $this->faker->dateTime(),
			'end_date' => $this->faker->dateTime(),
			'active' => $this->faker->boolean(),
			'company_no' => $this->faker->randomNumber(),
			'entered_by' => $this->faker->randomNumber(),
			'entry_timestamp' => $this->faker->dateTime(),
			'updated_by' => $this->faker->randomNumber(),
			'update_timestamp' => $this->faker->dateTime(),
        ];
    }
}
