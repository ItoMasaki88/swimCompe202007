<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = \Carbon\Carbon::now();

      /**
       *  管理者のサンプル
      **/
      DB::table('users')->insert([
        'name' => 'Admin',
        'sex' => True,
        'age' => 25,
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin'),
        'admin' => True,
        'remember_token' => str_random(10),
        'created_at' => $now,
        'updated_at' => $now,
      ]);


      $faker = Faker\Factory::create();
      $ageBands = [[6,12,], [13,15,], [16,18,], [19,29,], [30,49,], [50,80,],];
      $ageCounts = config('const.AGE_COUNTS');
      /**
       *  選手のサンプル
      **/
      foreach ([True,False] as $sex) {
        for ($eventCount=0; $eventCount<6; $eventCount++) {
          for ($ageCount=0; $ageCount<$ageCounts[$eventCount]; $ageCount++) {
            DB::table('users')->insert([
              'name' => $faker->name,
              'sex' => $sex,
              'age' => rand($ageBands[$eventCount][0], $ageBands[$eventCount][1]),
              'email' => $faker->email,
              'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
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
