<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Event;
use App\User;

class ShowRacesAddDelFormAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Event $event)
    {
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
                'raceId' => $race->id,
                'race_count' => count($race->entries),
                'startTime' => $race->start_time_texted2,
                'lanes' => $race->lanes,
                'entryRecords' => $entryRecords,
            ]);
        }

        $valid = isset($request->valid) ? true : false;

        return view('Admin.add-del-races', [
            'eventId' => $event->id,
            'event_count' => $event->entry_count,
            'eventName' => $event->event_name,
            'raceRecords' => $raceRecords,
            'valid' => $valid,
        ]);
    }
}
