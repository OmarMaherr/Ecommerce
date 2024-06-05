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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_status_id')->default(1)->after('discount_id');
            
            // Add foreign key constraint
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['order_status_id']);
            
            // Drop the order_status_id column
            $table->dropColumn('order_status_id');
        });
    }
};
