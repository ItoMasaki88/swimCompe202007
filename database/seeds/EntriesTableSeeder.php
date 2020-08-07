<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Race;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = Carbon::now();

      $birthCounts = config('const.AGE_COUNTS');

      $userId =3;
      $raceId =0;
      for ($sex=1; $sex<=2 ; $sex++) {
        foreach ($birthCounts as $birthCount) {
          for ($playerCount=0; $playerCount < $birthCount; $playerCount++) {
            if ($playerCount % 5 === 0) {
              $raceId++;
              $laneNo = 1;
            }

            DB::table('entries')->insert([
              'user_id' => $userId,
              'race_id' => $raceId,
              'laneNo' => $laneNo,
              'created_at' => $now,
              'updated_at' => $now,
            ]);

            $laneNo++;
            $userId++;
          }
        }
      }

    }
}
