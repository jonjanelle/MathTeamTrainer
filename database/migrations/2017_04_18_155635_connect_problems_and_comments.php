<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectProblemsAndComments extends Migration
{
    /**
     * Create one-to-many between problem and comments
     * @return void
     */
    public function up()
    {
      Schema::table('comments', function (Blueprint $table) {
        $table->integer('problem_id')->unsigned();
        $table->foreign('problem_id')->references('id')->on('problems');
      });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
      $table->dropForeign('comments_problem_id_foreign');
      $table->dropColumn('problem_id');
    }
}
