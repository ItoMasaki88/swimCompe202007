<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $raceCounts = [2, 2, 1, 3, 2, 2,];

      for ($sex=1; $sex<=2; $sex++) {
        $age =1;
        foreach ($raceCounts as $raceCount) {
          DB::table('events')->insert([
            'style' => rand(1,5),
            'distance' => rand(1,3),
            'sex' => $sex,
            'age' => $age,
            'playerType' => True,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);
          $age++;
        }
      }

      DB::table('events')->insert([
        'style' => rand(1,5),
        'distance' => rand(1,3),
        'sex' => 1,
        'age' => 4,
        'playerType' => True,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

    }
}
