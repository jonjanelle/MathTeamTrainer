<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //list table names in alphabetical order.
      Schema::create('problem_user', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('user_id')->unsigned();
          $table->integer('problem_id')->unsigned();

          // Make foreign keys
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('problem_id')->references('id')->on('problems');
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
        Schema::drop('problem_user');
    }
}
