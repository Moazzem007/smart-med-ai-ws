<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('bloodBanks', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable();
			$table->string('name_bn')->nullable();
			$table->string('code')->nullable();
			$table->string('slug')->nullable();
			$table->string('facility_type')->nullable();
			// $table->boolean('is_private');
			$table->string('division')->nullable();
			$table->string('district')->nullable();
			$table->string('city_corporation')->nullable();
			$table->string('upazila')->nullable();
			$table->string('mobile_1')->nullable();
			$table->string('mobile_2')->nullable();
			$table->string('email')->nullable();
			$table->text('address')->nullable();
			$table->float('latitude')->nullable();
			$table->float('longitude')->nullable();
			// $table->integer('completeness_percentage');
			$table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('bloodBanks');
    }
};
