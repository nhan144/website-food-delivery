<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class users extends Seeder
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
                "name"=> "NhanNguyen",
                "email"=>'nhan1@gmail.com',
                "password"=>bcrypt('nhan1'),
                "role"=>"1",
                "id_store_owner"=>"1",
                "phone"=>"0123456789",
                "created_at" => Carbon::now()
            ],
            [
                "name"=> "Nguyen Van A",
                "email"=>'vana@gmail.com',
                "password"=>bcrypt('nhan1'),
                "role"=>"1",
                "id_store_owner"=>"2",
                "phone"=>"0987654321",
                "created_at" => Carbon::now()
            ],
            [
                "name"=> "Thanh Vinh",
                "email"=>'vinh@gmail.com',
                "password"=>bcrypt('nhan1'),
                "role"=>"1",
                "id_store_owner"=>"3",
                "phone"=>"01113333",
                "created_at" => Carbon::now()
            ],


        ];
        \DB::table('users')->insert($data);
    }
}
