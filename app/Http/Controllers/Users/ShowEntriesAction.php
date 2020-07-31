<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowEntriesAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $myEntries = array();
      foreach ( \Auth::user()->entries as $entry) {
        $race = $entry->race;
        array_push($myEntries, [
          'eventId' => $race->event->id,
          'eventName' => $race->event->event_name,
          'raceNo' => $race->number,
          'startTime' => $race->start_time_texted,
          'laneNo' => $entry->lane_no,
          'result' => $entry->result_texted,
          'rank' => $entry->rank,
          'id' => $entry->id,
        ]);
      }

      return view('Users.entries', [
        'myEntries' => $myEntries,
        'count' => count($myEntries),
      ]);
    }
}
