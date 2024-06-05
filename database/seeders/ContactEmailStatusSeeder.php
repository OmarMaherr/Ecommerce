<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactEmailStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Define the data to be inserted
                $orderStatuses = [
                    ['name' => 'New'],
                    ['name' => 'Processed'],
                    ['name' => 'Archive'],
                ];
        
                // Insert data into the 'order_statuses' table
                DB::table('contact_emails_statuses')->insert($orderStatuses);
    }
}
