<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //Name is user's alias
            $table->string('email')->unique();
            $table->string('password');
            //XP and Solved count could be found from the problem_user pivot,
            //but are included here to avoid needing to count each login.
            $table->integer('xp')->default(0); //experience points
            $table->integer('solved')->default(0); //# of problems solved
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
