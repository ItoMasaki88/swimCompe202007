<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Event;

class RacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // タイムスタンプを取得
      $firstTime = new Carbon( config('const.START_TIME') );
      $eventId =1;

      $raceCounts = [2, 2, 1, 3, 2, 2,];

      for ($i=0; $i<2; $i++) {
        foreach ($raceCounts as $raceCount) {
          for ($k=1; $k<=$raceCount; $k++) {
            DB::table('races')->insert([
              'event_id' => $eventId,
              'startTime' => $firstTime->addSecond(600),
              'lanes' => config('const.LANE_NO'),
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]);
          }
          $eventId++;
        }
      }

      for ($i=0; $i <2; $i++) {
        DB::table('races')->insert([
          'event_id' => 13,
          'startTime' => $firstTime->addSecond(600),
          'lanes' => config('const.LANE_NO'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
      }

    }
}
