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
        'xp' => 1000
      ]);

      User::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Fig',
        'email' => 'a@b.com',
        'password'=> bcrypt('123456')
      ]);
    }
}
