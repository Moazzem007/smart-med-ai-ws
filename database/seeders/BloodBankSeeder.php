<?php

namespace Database\Seeders;

use App\Models\BloodBank;
use Illuminate\Database\Seeder;

class BloodBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        BloodBank::factory(10)->create();
    }
}
