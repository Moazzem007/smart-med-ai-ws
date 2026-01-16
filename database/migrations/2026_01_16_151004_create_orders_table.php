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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
			$table->string('order_no');
			$table->string('status')->default("pending_payment");
			$table->decimal('subtotal', 10, 2);
			$table->decimal('discount', 10, 2)->default(0);
			$table->decimal('tax', 10, 2)->default(0);
			$table->decimal('grand_total', 10, 2);
			$table->string('payment_status')->default("unpaid");
            
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
        Schema::dropIfExists('orders');
    }
};
