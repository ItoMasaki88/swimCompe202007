<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\User;

class ShowResultFormAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $event = Event::find($request->eventId);

      $raceRecords = [];
      foreach ($event->races as $race) {

        $entryRecords = [];
        foreach ($race->entries as $entry) {
          $player = User::find($entry->user_id);

          if ($entry->result == '--') {
            $min = '';
            $sec = '';
          } else {
            $min = floor($entry->result /60);
            $sec = $entry->result - $min*60;
          }

          array_push($entryRecords, [
            'entryId' => $entry->id,
            'playerName' => $player->name,
            'laneNo' => $entry->lane_no,
            'age' => $player->age,
            'min' => $min,
            'sec' => $sec,
            'rank' => $entry->rank,
          ]);
        }

        array_push($raceRecords, [
          'No' => $race->number,
          'startTime' => $race->start_time_texted2,
          'entryRecords' => $entryRecords,
        ]);
      }

      $eventRecord = [
        'eventId' => $event->id,
        'eventName' => $event->event_name,
        'raceRecords' => $raceRecords,
      ];

      return view('admin.result', ['eventRecord' => $eventRecord]);
    }
}
