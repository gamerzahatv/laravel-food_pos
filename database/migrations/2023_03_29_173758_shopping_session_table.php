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
        Schema::create('shopping_session', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', false, false)->length(255);
            $table->integer('total')->nullable();
            $table->tinyInteger('status')->length(1)->nullable();;
            $table->bigInteger('billorderid')->length(1)->nullable();;
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_session');

    }
    protected $dates = ['last_updated'];
};
