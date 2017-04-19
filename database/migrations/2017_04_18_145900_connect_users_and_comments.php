<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectUsersAndComments extends Migration
{
    /**
     * Run the migrations.
     * Create a one-to-many relationship between a user and comments
     * make by that user.
     * @return void
     */
    public function up()
    {
      Schema::table('comments', function (Blueprint $table) {
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('comments_user_id_foreign');
        $table->dropColumn('user_id');
    }
}
