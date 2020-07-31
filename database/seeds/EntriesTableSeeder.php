<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

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

      $ageCounts = config('const.AGE_COUNTS');

      $userId =2;
      $raceId =0;
      for ($sex=1; $sex<=2 ; $sex++) {
        foreach ($ageCounts as $ageCount) {
          for ($playerCount=0; $playerCount < $ageCount; $playerCount++) {
            if ($playerCount % 5 === 0) $raceId++;

            DB::table('entries')->insert([
              'user_id' => $userId,
              'race_id' => $raceId,
              'laneNo' => DB::table('entries')
                            ->where('race_id', $raceId)
                            ->count() +1,
              'created_at' => $now,
              'updated_at' => $now,
            ]);

            $userId++;
          }
        }
      }

    }
}
