<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\User;

class ShowHoleRaceAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $events = Event::all();

        $eventRecords = [];
        foreach ($events as $event) {

          $raceRecords = [];
          foreach ($event->races as $race) {

            $entryRecords = [];
            foreach ($race->entries as $entry) {
              $player = User::find($entry->user_id);
              array_push($entryRecords, [
                'laneNo' => $entry->lane_no,
                'playerName' => $player->name,
                'age' => $player->age,
                'result' => $entry->result_texted,
                'rank' => $entry->rank,
              ]);
            }

            array_push($raceRecords, [
              'No' => $race->number,
              'startTime' => $race->start_time_texted2,
              'entryRecords' => $entryRecords,
            ]);
          }

          array_push($eventRecords, [
            'eventId' => $event->id,
            'eventName' => $event->event_name,
            'raceRecords' => $raceRecords,
          ]);
        }

        return view('Admin.hole', ['eventRecords' => $eventRecords]);
    }
}
