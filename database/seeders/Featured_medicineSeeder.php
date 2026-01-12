<?php

namespace Database\Seeders;

use App\Models\Featured_medicine;
use Illuminate\Database\Seeder;

class Featured_medicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Featured_medicine::factory(10)->create();
    }
}
