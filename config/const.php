<?php

use Carbon\Carbon;

return [
  'TITLE' => '〇〇市水泳大会',
  'HOST' => '◇田 ✕男 （〇〇市長）',
  'LOCATION' => '〇〇市体育文化センター',
  'ADDRESS' => '△△県 〇〇市 ##町 @@丘 3-10-20',
  'HOLDING_PERIOD' => '2020年08月08日（土）〜 2020年08月10日（月）',
  'ENTRY_PERIOD' => '2020年08月01日（土）',
  'ENTRY_FEE' => '1000円（＋エントリー数に応じて加算）',

  'START_TIME' => Carbon::parse('2020-08-10 08:50:00')->timestamp,
  'START_DAY' => Carbon::parse('2020-08-10')->timestamp,
  'LANE_NO' => 5,
  'AGE_COUNTS' => [7, 8, 3, 13, 10, 9,], //seederにて利用
  'MAX_RACES' => 10,
];
