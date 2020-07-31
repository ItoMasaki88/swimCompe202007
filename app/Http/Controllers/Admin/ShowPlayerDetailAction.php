<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ShowPlayerDetailAction extends Controller
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
        $player = User::find($request->player_id);

        $playerEntries = array();
        foreach ( $player->entries as $entry) {
          $race = $entry->race;
          array_push($playerEntries, [
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

        return view('Admin.player-info', [
          'player' => $player,
          'playerEntries' => $playerEntries,
          'count' => count($playerEntries),
        ]);
    }
}
