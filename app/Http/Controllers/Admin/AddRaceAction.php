<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddRaceRequest;
use App\Event;
use App\Race;
use Carbon\Carbon;

class AddRaceAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AddRaceRequest $request)
    {
        $eventId = $request->eventId;
        $event = Event::find($eventId);

        // 最大レース数のバリデーションと未通過時の処理------------------
        $race_count = $event->races->count() + $request->races;

        if ($race_count > config('const.MAX_RACES')) {
          return redirect()->route('RacesAddDelForm', [
            'eventId' => $eventId,
            'valid' => 1,
          ]);
        }
        // バリデーションここまで------------------------------------


        $race = Race::where('event_id', $eventId)->orderBy('startTime', 'desc')->first();
        $time = new Carbon($race->startTime);

        for ($i=0; $i<$request->races; $i++) {
          Race::create([
            'event_id' => $eventId,
            'startTime' => $time->addSecond(600),
            'lanes' => config('const.LANE_NO'),
          ]);
        }

        return redirect()->route('Hole');
    }
}
