<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Race;
use Carbon\Carbon;

class MakeEventAction extends Controller
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
        // validation が入る予定

        $data = Event::create([
          'style' => $request->style,     //free brest back fly medley
          'distance' => $request->distance,    //50 100 200
          'sex' => $request->sex,   //male female (mix)
          'age' => $request->age,   //elemaentary jouniorhigh high adult over30 over50
          'playerType' => (bool) $request->entryType,    //individual group
        ]);

        $firstDay = new Carbon( config('const.START_DAY') );
        $firstDay->addSecond(
          ($request->date-1) *60*60*24
          + $request->hour *60*60
          + ($request->minute) *60 -600
        );
        for ($i=0; $i<ceil($request->races); $i++) {
          Race::create([
            'event_id' => $data->id,
            'startTime' => $firstDay->addSecond(600),
            'lanes' => config('const.LANE_NO'),
          ]);
        }

        return redirect( route('Hole') );
    }
}
