<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name');
            $table->unsignedBigInteger('category_id')->after('id');
    
            // Define foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
    
};
