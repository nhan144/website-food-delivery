<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class store extends Seeder
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
                "name"=> "Trà Sữa Tocotoco - Ngọc Hồi",
                "user_id"=> "1",
                "address"=> "Km13 QL1A Ngọc Hồi, X. Ngọc Hồi, Thanh Trì, Hà Nội",
                "phone"=> "0755-590-243",
                "description"=> "",
                "open"=> 0,
                "img"=>"https://images.foody.vn/res/g67/662390/prof/s640x400/foody-upload-api-foody-mobile-6ec017c3-c232-45fb-8-200429162344.jpg",
                "time_open"=> "7",
                "time_end"=> "19"
            ],
            [
                "name"=> "Ốc Đức Anh - Ốc & Đồ Ăn Vặt",
                "user_id"=> "2",
                "address"=> "17 Ngõ 167 Dương Quảng Hàm, P. Quan Hoa, Cầu Giấy, Hà Nội",
                "phone"=> "0355-564-886",
                "description"=> "",
                "open"=> 0,
                "img"=>"https://images.foody.vn/res/g100004/1000031178/prof/s640x400/file_a27c55f4-2821-4f8b-ba2f-dda-6bfd97a7-210727131046.jpeg",
                "time_open"=> "7",
                "time_end"=> "19"
            ],
            [
                "name"=> "Vua Đồ Ngon - Gà & Hải Sản Tươi",
                "user_id"=> "3",
                "address"=> "138 Ngõ 337 Định Công, P. Định Công, Hoàng Mai, Hà Nội",
                "phone"=> "0355-580-523",
                "description"=> "",
                "open"=> 0,
                "img"=>"https://images.foody.vn/res/g100003/1000029407/prof/s640x400/file_restaurant_photo_uwhe_16368-8eb2c330-211114143925.jpg",
                "time_open"=> "7",
                "time_end"=> "19"
            ],
            [
                "name"=> "Tanka Quán - Chân & Cánh Gà Ướp Sẵn - Nguyên Hồng",
                "user_id"=> "4",
                "address"=> "3AG4B Ngõ 12 Nguyên Hồng, P. Thành Công, Ba Đình, Hà Nội",
                "phone"=> "0955-504-351",
                "description"=> "",
                "open"=> 0,
                "img"=>"https://images.foody.vn/res/g73/729267/prof/s640x400/file_restaurant_photo_7dau_16335-99a4684a-211006155557.jpg",
                "time_open"=> "7",
                "time_end"=> "19"
            ],
        ];
        \DB::table('store')->insert($data);
    }
}
