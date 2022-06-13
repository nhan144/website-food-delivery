<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumInteger('user_id');
            $table->mediumInteger('store_id');
            $table->mediumInteger('food_id');
            $table->mediumInteger('quantity');
            $table->mediumInteger('discount')->nullable();
            $table->mediumInteger('price');
            $table->mediumInteger('status');
            $table->mediumInteger('payment');
            $table->String('phone');
            $table->String('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
