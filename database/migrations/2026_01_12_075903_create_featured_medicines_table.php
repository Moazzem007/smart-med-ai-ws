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
        Schema::create('featured_medicines', function (Blueprint $table) {
            $table->id()->primary();
			$table->integer('user_id')->nullable();
			$table->integer('medicine_id');
			$table->integer('sort_order')->default(0);
			$table->boolean('active')->default(1);
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
        Schema::dropIfExists('featured_medicines');
    }
};
