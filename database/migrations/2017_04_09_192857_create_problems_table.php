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
        $table->string('subcategory');
        $table->string('difficulty');
        $table->string('image');
        $table->double('answer', 15, 8);
        $table->integer('xp');
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
