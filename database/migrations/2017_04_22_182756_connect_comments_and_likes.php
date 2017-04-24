<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectCommentsAndLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('likes', function (Blueprint $table) {
        $table->integer('comment_id')->unsigned();
        $table->foreign('comment_id')->references('id')->on('comments');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $table->dropForeign('likes_comment_id_foreign');
      $table->dropColumn('comment_id');
    }
}
