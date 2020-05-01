<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
        	'order_id' => Str::random(10),
	        'order_customer_name' => Str::random(10),
	        'order_item' => Str::random(50),
	        'order_value' => Str::random(10),
	        'order_date' => Str::random(10),
        ]);
    }
}
