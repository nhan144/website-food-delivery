<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use DB;

class bill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 200;
        for ($i = 0; $i < $limit; $i++){
            DB::table('bill')->insert([
                'user_id' => $faker->numberBetween($min = 1, $max = 3),
                'store_id' => '1',
                'order_info' => $faker->numerify('Hello ###'),
                'cash' => $faker->numberBetween($min = 20, $max = 2000)*1000,
                'created_at' => $faker->dateTimeInInterval($startDate = '-10 days', $interval = '+ 10 days', $timezone = null),
            ]);
        }
    }
}
