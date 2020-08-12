<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeEventRequest;
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
    public function __invoke(MakeEventRequest $request)
    {
        // 種目が重複しているかのバリデーションと未通過時の処理------------------
        if (
          Event::where('style', $request->style)
            ->where('distance', $request->distance)
            ->where('sex', $request->sex)
            ->where('age', $request->age)
            ->where('playerType', $request->playerType==1)
            ->first() !== null
        ) {
          return view('Admin.make-event', ['duplicate' => true]);
        }
        // バリデーションここまで------------------------------------

        $data = Event::create([
          'style' => $request->style,     //free brest back fly medley
          'distance' => $request->distance,    //50 100 200
          'sex' => $request->sex,   //male female (mix)
          'age' => $request->age,   //elemaentary jouniorhigh high adult over30 over50
          'playerType' => $request->playerType==1,    //individual group
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

        return redirect()->route('Hole');
    }
}
