<?php

use Illuminate\Database\Seeder;
use App\User, App\Problem;

class ProblemUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       // Key is a user id, value is an array of problem ids
       $users =[
           1 => [1,2,3,7,8],
           2 => [5, 2, 9],
           4 => [1, 2]
       ];

       //creating a new pivot for each problem
       foreach($users as $uid => $problems) {
           // get user
           $user = User::where('id','=',$uid)->first();

           //loop through each problem for user, adding the pivot
           foreach($problems as $pid) {
               $p = Problem::where('id','=',$pid)->first();

              //Connect this problem to user
               $user->problems()->save($p);
           }
       }
     }
}
