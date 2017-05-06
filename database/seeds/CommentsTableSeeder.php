<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Comment::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'message'=> 'I am the first message!',
        'problem_id'=>1,
        'likes'=>1,
        'dislikes'=>2,
        'user_id'=>1
      ]);

      Comment::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'message'=> 'I am the second message!',
        'problem_id'=>2,
        'dislikes'=>1,
        'user_id'=>1
      ]);

      Comment::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'message' => 'I am the third message!',
        'problem_id'=>2,
        'user_id'=>2
      ]);

      Comment::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'message'=> 'I am the BEST message!',
        'problem_id'=>2,
        'likes'=>2,
        'user_id'=>2
      ]);

    }
}
