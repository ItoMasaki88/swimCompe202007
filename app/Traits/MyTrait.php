<?php

namespace App\Traits;

use App\User;
use App\Event;

trait myTrait {

  /** エントリー可能であるかの判定
  *
  * @param Various
  * @return int
  */
  // UserデータがEventの設定クラスに一致すればTrue
  public function entryStatus(
    User $user, // Eloquent\Collection(User)
    Event $event // Eloquent\Collection(Event)
  ) {
    $ageFlag = 0;
    $sexFlag = 0;

    // エントリー済かを判定する
    $entriedEventsID = array();
    foreach ($user->entries as $entry) {
      array_push($entriedEventsID, $entry->race->event_id);
    }
    if (in_array($event->id, $entriedEventsID)) {
      return 2;
    }

    // エントリー上限に達しているかを判定
    if ($event->persons <= $event->entry_count) {
      return 3;
    }

    // エントリー条件に合致するか判定する
    foreach ($user->ageClassify() as $userValue)
    {
      if ($userValue == $event->int_age) $ageFlag = 1;
    }
    foreach ($user->sexClassify() as $userValue)
    {
      if ($userValue == $event->int_sex) $sexFlag = 1;
    }
    return $ageFlag * $sexFlag;
  }


  public function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

}
