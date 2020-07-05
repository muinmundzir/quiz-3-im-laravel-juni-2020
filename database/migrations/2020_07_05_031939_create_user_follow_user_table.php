<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_follow_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // Foreign Key
            $table->bigInteger('id_followed_users')->unsigned();
            $table->foreign('id_followed_users')
                  ->references('id')->on('users');
            $table->bigInteger('id_follower_users')->unsigned();
            $table->foreign('id_follower_users')
                  ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_follow_user');
    }
}
