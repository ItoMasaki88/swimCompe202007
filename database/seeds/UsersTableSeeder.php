<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = Carbon::now();

      /**
       *  管理者のサンプル
      **/
      $a_birth = new Carbon('1994-08-10');
      DB::table('users')->insert([
        'name' => 'Admin',
        'sex' => True,
        'birth' => $a_birth,
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin321'),
        'admin' => True,
        'remember_token' => str_random(10),
        'created_at' => $now,
        'updated_at' => $now,
      ]);

      /**
       *  「選手として簡単ログイン」のサンプル
      **/
      $p_birth = new Carbon('1984-08-10');
      DB::table('users')->insert([
        'name' => 'ゲスト',
        'sex' => True,
        'birth' => $p_birth,
        'email' => 'guest@gmail.com',
        'password' => Hash::make('guest134pass'),
        'admin' => False,
        'remember_token' => str_random(10),
        'created_at' => $now,
        'updated_at' => $now,
      ]);


      $faker = Faker\Factory::create('ja_JP');
      $birthBands = [[7,12,], [13,15,], [16,18,], [19,29,], [30,49,], [50,80,],];
      $birthCounts = config('const.AGE_COUNTS');
      /**
       *  選手のサンプル
      **/
      foreach ([True,False] as $sex) {
        for ($eventCount=0; $eventCount<6; $eventCount++) {
          for ($birthCount=0; $birthCount<$birthCounts[$eventCount]; $birthCount++) {
            $birth = new Carbon('2020-08-10');
            DB::table('users')->insert([
              'name' => $faker->name,
              'sex' => $sex,
              'birth' => $birth->subDay(
                (rand($birthBands[$eventCount][0], $birthBands[$eventCount][1]) - 1)*365
                 + rand(0,11)*30 + rand(1,31)
              ),
              'email' => $faker->email,
              'password' => Hash::make('secret321'),
              'admin' => False,
              'remember_token' => str_random(10),
              'created_at' => $now,
              'updated_at' => $now,
            ]);
          }
        }
      }

    }
}
