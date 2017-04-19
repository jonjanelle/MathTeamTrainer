<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Jon',
        'email' => 'jonjanelle1@gmail.com',
        'password'=> bcrypt('123456'),
        'xp' => 1000,
        'solved'=>5
      ]);

      User::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Fig',
        'email' => 'a@b.com',
        'password'=> bcrypt('123456')
      ]);

      User::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Rick',
        'xp' => 2000,
        'solved'=>20,
        'email' => 'frip@frap.com',
        'password'=> bcrypt('12345678')
      ]);

      User::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Hayley',
        'xp' => 100,
        'solved'=>1,
        'email' => 'hay@ley.com',
        'password'=> bcrypt('12345678')
      ]);


    }
}
