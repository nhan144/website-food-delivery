<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Store extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumInteger('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('description');
            $table->string('open');
            $table->string('img');
            $table->mediumInteger('time_open');
            $table->mediumInteger('time_end');
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
