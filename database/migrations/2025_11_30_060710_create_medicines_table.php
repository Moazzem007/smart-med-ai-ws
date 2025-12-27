<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('medicines', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
			$table->string('sku')->nullable();
			$table->string('gtin')->nullable();
			$table->string('brand_name')->required();
			$table->string('generic_name')->nullable();
			$table->string('manufacturer')->nullable();
			$table->string('model_code')->nullable();
			$table->string('strength')->nullable();
			$table->string('form')->nullable();
			$table->string('pack_size')->nullable();
			$table->string('unit')->nullable();
			$table->boolean('is_prescription')->default(false);
			$table->boolean('controlled_drug')->default(false);
			$table->string('schedule')->nullable();
			$table->string('storage_temp')->nullable();
			$table->integer('expiry_months')->nullable();
			$table->decimal('base_price')->nullable();
			$table->json('categories')->nullable();
			$table->json('tags')->nullable();
			$table->string('search_vector')->nullable();
			$table->json('attributes')->nullable();
			$table->json('images')->nullable();
			$table->json('metadata')->nullable();
			$table->boolean('active')->default(true);
			$table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('medicines');
    }
};
