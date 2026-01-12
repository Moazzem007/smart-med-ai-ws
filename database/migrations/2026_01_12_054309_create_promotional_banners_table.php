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
        Schema::create('promotional_banners', function (Blueprint $table) {
            $table->id()->primary();
			$table->string('title');
			$table->string('image_path');
			$table->string('link_url')->nullable();
			$table->string('position')->nullable();
			$table->integer('sort_order')->default(0);
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->boolean('active')->default(1);
			$table->integer('company_no')->default(1);
			$table->integer('entered_by')->nullable();
			$table->timestamp('entry_timestamp')->default(now());
			$table->integer('updated_by')->nullable();
			$table->timestamp('update_timestamp')->nullable();

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
        Schema::dropIfExists('promotional_banners');
    }
};
