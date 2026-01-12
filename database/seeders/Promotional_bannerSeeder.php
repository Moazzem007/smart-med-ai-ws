<?php

namespace Database\Seeders;

use App\Models\Promotional_banner;
use Illuminate\Database\Seeder;

class Promotional_bannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Promotional_banner::factory(10)->create();
    }
}
