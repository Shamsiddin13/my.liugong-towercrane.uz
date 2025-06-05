<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Added for raw SQL

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the sequence for orderId
        DB::statement("CREATE SEQUENCE IF NOT EXISTS order_id_seq START 160000;");

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderId', 24)->unique()->default(DB::raw("CAST(nextval('order_id_seq'::regclass) AS VARCHAR(24))")); // Uses order_id_seq
            $table->string('status')->nullable();
            $table->unsignedBigInteger('region')->nullable();
            $table->string('full_name', 64)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->text('address_comment')->nullable();
            $table->text('status_comment')->nullable();
            $table->decimal('sum', 15, 2)->nullable();
            $table->decimal('discount_amount', 15, 2)->nullable();
            $table->decimal('total_sum', 15, 2)->nullable();
            $table->decimal('purchase_sum', 15, 2)->nullable();
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        DB::statement("DROP SEQUENCE IF EXISTS order_id_seq;");
    }
};
