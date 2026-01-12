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
        Schema::create('appInfos', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
			$table->string('current_version');
			$table->string('minimum_version');
			$table->boolean('maintenance_mode')->default(0);
			$table->text('maintenance_message')->nullable();
			$table->boolean('force_update')->default(0);
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
        Schema::dropIfExists('appInfos');
    }
};
