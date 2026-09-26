<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['cancelled', 'pending', 'shipped', 'delivered'])->default('pending');
            $table->string('tracking_number')->nullable();
            $table->string('courier_name')->nullable();
            $table->dateTime('shipped_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->decimal('total_amount', 12, 2);
            $table->timestamps();

            $table->foreignId('user_id')
                ->constrained(table: 'users', column: 'id')
                ->cascadeOnDelete();

            $table->foreignId('shipping_address_id')
                ->constrained(table: 'user_addresses', column: 'id')
                ->cascadeOnDelete();
            
            $table->foreignId('discount_id')
                ->nullable()
                ->constrained(table: 'discounts', column: 'id')
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
