<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up(): void
    {
        Schema::table('contact_emails', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_emails_status')->default(1)->after('message');
            
            // Add foreign key constraint
            $table->foreign('contact_emails_status')->references('id')->on('contact_emails_statuses');
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_emails', function (Blueprint $table) {
            $table->dropForeign(['contact_emails_status']);
            
            // Drop the order_status_id column
            $table->dropColumn('contact_emails_status');
        });
    }
};
