<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProblemsTableSeeder::class);
        //Comments must come after user/problem since they are linked
        //to user_ids and problem_ids
        $this->call(CommentsTableSeeder::class);
        $this->call(ProblemUserTableSeeder::class);

    }
}
