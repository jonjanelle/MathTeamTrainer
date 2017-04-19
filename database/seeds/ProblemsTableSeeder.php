<?php

use Illuminate\Database\Seeder;
use App\Problem;

class ProblemsTableSeeder extends Seeder
{


  public function algebraSeed()
  {
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 1',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP1.PNG',
      'answer'=> -0.375,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 2',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP2.PNG',
      'answer'=> -72,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 3',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP3.PNG',
      'answer'=> -0.25,
      'xp'=>150
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 4',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP4.PNG',
      'answer'=> 30,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 5',
      'difficulty'=>'medium',
      'image'=>'/images/algebra/algebraP5.PNG',
      'answer'=> 130,
      'xp'=>200
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 6',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP6.PNG',
      'answer'=> 15,
      'xp'=>150
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 7',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP7.PNG',
      'answer'=> 30,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 8',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP8.PNG',
      'answer'=> 14.81,
      'xp'=>150
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 9',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP9.PNG',
      'answer'=> 10,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 10',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP10.PNG',
      'answer'=> 3.75,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 11',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP11.PNG',
      'answer'=> 1800,
      'xp'=>150
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 12',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP12.PNG',
      'answer'=> 11,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 13',
      'difficulty'=>'easy',
      'image'=>'/images/algebra/algebraP13.PNG',
      'answer'=> 87,
      'xp'=>150
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Algebra',
      'name'=> 'Problem 14',
      'difficulty'=>'medium',
      'image'=>'/images/algebra/algebraP14.PNG',
      'answer'=> 6,
      'xp'=>200
    ]);
  }

  public function geomSeed() {
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Geometry',
      'name'=> 'Problem 1',
      'difficulty'=>'easy',
      'image'=>'/images/geometry/geometryP1.PNG',
      'answer'=> 88,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Geometry',
      'name'=> 'Problem 2',
      'difficulty'=>'easy',
      'image'=>'/images/geometry/geometryP2.PNG',
      'answer'=> 71,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Geometry',
      'name'=> 'Problem 3',
      'difficulty'=>'easy',
      'image'=>'/images/geometry/geometryP3.PNG',
      'answer'=> 4.8125,
      'xp'=>150
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Geometry',
      'name'=> 'Problem 4',
      'difficulty'=>'easy',
      'image'=>'/images/geometry/geometryP4.PNG',
      'answer'=> 216,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Geometry',
      'name'=> 'Problem 5',
      'difficulty'=>'medium',
      'image'=>'/images/geometry/geometryP5.PNG',
      'answer'=> 22.5,
      'xp'=>200
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Geometry',
      'name'=> 'Problem 6',
      'difficulty'=>'easy',
      'image'=>'/images/geometry/geometryP6.PNG',
      'answer'=> 24,
      'xp'=>150
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Geometry',
      'name'=> 'Problem 7',
      'difficulty'=>'easy',
      'image'=>'/images/geometry/geometryP7.PNG',
      'answer'=> 26,
      'xp'=>100
    ]);
    Problem::insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'category'=>'Geometry',
      'name'=> 'Problem 8',
      'difficulty'=>'medium',
      'image'=>'/images/geometry/geometryP8.PNG',
      'answer'=> 20,
      'xp'=>200
    ]);
  }

  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $this->algebraSeed();
    $this->geomSeed();
  }
}
