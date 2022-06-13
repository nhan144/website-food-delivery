<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use DB;
class rate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 1000;
        for ($i = 0; $i < $limit; $i++){
            DB::table('rate')->insert([
                'food_id' => $faker->numberBetween($min = 1, $max = 60),
                'rate_point' => $faker->numberBetween($min = 2, $max = 5),
                'created_at' => $faker->dateTimeInInterval($startDate = '-5 days', $interval = '+ 5 days', $timezone = null),
            ]);
        }
        //
    }
}
