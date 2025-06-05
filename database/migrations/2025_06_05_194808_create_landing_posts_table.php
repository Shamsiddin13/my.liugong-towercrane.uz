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
        Schema::create('landing_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('landing_id');
            $table->string('unique_link');
            $table->string('full_link');
            $table->unsignedBigInteger('pixel_id')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('landing_id')
                ->references('id')->on('landing')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_posts');
    }
};
