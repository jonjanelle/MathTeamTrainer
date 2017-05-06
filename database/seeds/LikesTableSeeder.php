<?php

use Illuminate\Database\Seeder;
use App\Like;
class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Like::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'rating'=>1,
        'comment_id'=>1,
        'user_id'=>1
      ]);

      Like::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'rating'=>-1,
        'comment_id'=>2,
        'user_id'=>2
      ]);

      Like::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'rating'=>-1,
        'comment_id'=>1,
        'user_id'=>1
      ]);

      Like::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'rating'=>-1,
        'comment_id'=>1,
        'user_id'=>1
      ]);

      Like::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'rating'=>1,
        'comment_id'=>4,
        'user_id'=>2
      ]);

      Like::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'rating'=>1,
        'comment_id'=>4,
        'user_id'=>1
      ]);


    }
}
