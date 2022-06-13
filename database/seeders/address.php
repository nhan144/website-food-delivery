<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class address extends Seeder
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
                "name"=> "nhà 1",
                "user_id"=>'1',
                "address"=>"đây là đâu",
                "created_at" => Carbon::now()
            ],
            [
                "name"=> "công việc",
                "user_id"=>'1',
                "address"=>"ĐÂY LÀ ĐÂU @",
                "created_at" => Carbon::now()
            ],

        ];
        \DB::table('address')->insert($data);
    }
}
