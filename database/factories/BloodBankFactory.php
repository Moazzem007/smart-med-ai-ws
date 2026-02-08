<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BloodBankFactory extends Factory
{
    public function definition(): array
    {
        return [
            'external_id' => createOrRandomFactory(\App\Models\External::class),
			'uuid' => $this->faker->firstName(),
			'name' => $this->faker->firstName(),
			'name_bn' => $this->faker->firstName(),
			'code' => $this->faker->firstName(),
			'slug' => $this->faker->firstName(),
			'facility_type' => $this->faker->firstName(),
			'is_private' => $this->faker->boolean(),
			'division' => $this->faker->firstName(),
			'district' => $this->faker->firstName(),
			'city_corporation' => $this->faker->firstName(),
			'upazila' => $this->faker->firstName(),
			'mobile_1' => $this->faker->firstName(),
			'mobile_2' => $this->faker->firstName(),
			'email' => $this->faker->safeEmail(),
			'address' => $this->faker->text(),
			'latitude' => $this->faker->randomFloat(),
			'longitude' => $this->faker->randomFloat(),
			'completeness_percentage' => $this->faker->randomNumber(),
			'is_active' => $this->faker->boolean(),
        ];
    }
}
