<?php

namespace Database\Seeders;

use App\Models\AppInfo;
use Illuminate\Database\Seeder;

class AppInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        AppInfo::factory(10)->create();
    }
}
