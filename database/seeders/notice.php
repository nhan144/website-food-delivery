<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class notice extends Seeder
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
                "title"=>"Bạn có đơn đặt hàng mới!",
                "content"=>"Bạn có đơn hàng mới từ NhanNguyen!",
                "status"=>"2",
                "created_at" => Carbon::now()
            ],
            [
                "user_id"=> "1",
                "title"=>"Đơn hàng của bạn đã được giao!",
                "content"=>"Đơn hàng mã 1 đã được giao!",
                "status"=>"0",
                "created_at" => Carbon::now()
            ],
            [
                "user_id"=> "1",
                "title"=> "Đánh giá chất lượng món ăn bạn vừa đặt!",
                "content"=> "Hãy nhấn vào đường link để đánh giá chất lượng món ăn bạn vừa đặt!",
                "status"=>"0",
                "created_at" => Carbon::now()
            ],

        ];
        \DB::table('notice')->insert($data);
    }
}
