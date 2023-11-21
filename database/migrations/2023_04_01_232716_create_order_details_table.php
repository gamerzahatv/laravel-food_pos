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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->length(255)->nullable();
            $table->bigInteger('order_id')->length(255)->nullable();
            $table->float('total')->length(255)->nullable();
            $table->integer('payment_id')->length(255)->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('date_created')->length(255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
