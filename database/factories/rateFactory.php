<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class rateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'food_id' => $this->faker->numberBetween($min = 1, $max = 60),
            'rate_point' => $this->faker->numberBetween($min = 1, $max = 5),
            'created_at' => $this->faker->dateTimeInInterval($startDate = '-30 days', $interval = '+ 5 days', $timezone = null),
        ];
    }
}
