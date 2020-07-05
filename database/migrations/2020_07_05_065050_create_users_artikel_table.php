<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_artikel', function (Blueprint $table) {
            $table->bigInteger('id_artikel')->unsigned();
            $table->foreign('id_artikel')
                  ->references('id')->on('artikel')->onDelete('cascade');
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')
                  ->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('users_artikel');
    }
}
