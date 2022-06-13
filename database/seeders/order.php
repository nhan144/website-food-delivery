<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class order extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "user_id"=> "1",
                "store_id"=>"1",
                "food_id"=>"1",
                "quantity" => "3",
                "price" => "27600",
                "status" => "0",
                "payment" => "0",
                "address" => "đây là đâu",
                "created_at" => Carbon::now(),
            ],
            [
                "user_id"=> "1",
                "store_id"=>"1",
                "food_id"=>"2",
                "quantity" => "2",
                "price" => "27600",
                "status" => "0",
                "payment" => "0",
                "address" => "đây là đâu",
                "created_at" => Carbon::now(),
            ]
        ];
        \DB::table('order')->insert($data);
    }
}
