<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;

class ShowRacesDelFormAction extends Controller
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

          array_push($raceRecords, [
            'No' => $race->number,
            'raceId' => $race->id,
            'startTime' => $race->start_time_texted2,
            'race_count' => count($race->entries),
            'lanes' => $race->lanes,
          ]);
        }

        array_push($eventRecords, [
          'eventId' => $event->id,
          'eventName' => $event->event_name,
          'event_count' => $event->entry_count,
          'raceRecords' => $raceRecords,
        ]);
      }

      return view('Admin.del-races', ['eventRecords' => $eventRecords]);
    }
}
