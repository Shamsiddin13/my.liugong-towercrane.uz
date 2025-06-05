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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_db_id')->constrained('orders')->onDelete('cascade');
            $table->string('orderId', 24); // Denormalized
            $table->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete();
            $table->string('product')->nullable();
            $table->string('sku')->nullable();
            $table->integer('quantity');
            $table->decimal('buy_price', 10, 2)->nullable();
            $table->decimal('sell_price', 10, 2);
            $table->string('image_url')->nullable();
            $table->timestamps(0);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_items');
    }
};
