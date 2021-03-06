<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantUserTable extends Migration
{
    public function up()
    {
        Schema::create('restaurant_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer ('restaurant_id') -> unsigned ();
            $table->integer ('user_id') -> unsigned ();
            $table->integer ('role');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurant_user');
    }
}
