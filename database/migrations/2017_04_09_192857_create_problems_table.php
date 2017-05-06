<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //category,subcategory,name,difficulty,image,answer,xp
      Schema::create('problems', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('category');
        $table->string('subcategory')->nullable();
        $table->integer('difficulty')->unsigned();
        $table->string('image');
        $table->double('answer', 15, 8);
        $table->integer('xp');
        //$table->integer('likes')->default(0);
        //$table->integer('dislikes')->default(0);
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
      Schema::dropIfExists('problems');
    }
}
