<?php

namespace Database\Seeders;

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
        $this->call(users::class);
        $this->call(store::class);
        $this->call(food::class);
        $this->call(address::class);
        $this->call(notice::class);
        $this->call(order::class);
        // $this->call(rate::class);
    }
}
