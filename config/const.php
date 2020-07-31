<?php

use Carbon\Carbon;

return [
  'START_TIME' => Carbon::parse('2020-08-10 08:50:00')->timestamp,
  'START_DAY' => Carbon::parse('2020-08-10')->timestamp,
  'LANE_NO' => 5,
  'AGE_COUNTS' => [7, 8, 3, 13, 10, 9,], //seederにて利用
];
