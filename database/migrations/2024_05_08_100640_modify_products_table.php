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
            // Make category_id nullable
            $table->unsignedBigInteger('category_id')->nullable()->change();

            // Add foreign key constraint for color_id
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');

            // Add foreign key constraint for brand_id
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');

            // Add description column
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop foreign key constraint for color_id
            $table->dropForeign(['color_id']);
            // Drop foreign key constraint for brand_id
            $table->dropForeign(['brand_id']);

            // Change category_id back to not nullable
            $table->unsignedBigInteger('category_id')->nullable(false)->change();

            // Drop color_id column
            $table->dropColumn('color_id');
            // Drop brand_id column
            $table->dropColumn('brand_id');

            // Drop description column if exists
            $table->dropColumn('description');
        });
    }
};
