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
        // order_items
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('price', 12, 2);
            $table->timestamps();

            $table->foreignId('order_id')
                ->constrained(table: 'orders', column: 'id')
                ->cascadeOnDelete();

            $table->foreignId('item_id')
                ->constrained(table: 'items', column: 'id')
                ->cascadeOnDelete();
            
            $table->foreignId('variant_id')
                ->constrained(table: 'item_variants', column: 'id')
                ->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
