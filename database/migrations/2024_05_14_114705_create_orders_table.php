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
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->decimal('latitude', 10, 8); 
            $table->decimal('longitude', 11, 8);
            $table->decimal('total_price', 10, 2); 
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
        
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
