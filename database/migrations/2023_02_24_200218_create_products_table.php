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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id', false, false)->length(6);
            $table->string('product_name');
            $table->longText('product_desc');
            $table->decimal('product_price');
            $table->timestamps();
            $table->softDeletes();
            $table->string('product_image');
            $table->string('product_type');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
