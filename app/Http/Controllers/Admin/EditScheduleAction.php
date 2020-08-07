<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditScheduleRequest;
use App\Race;
use Carbon\Carbon;
use App\Traits\MyTrait;

class EditScheduleAction extends Controller
{
    use myTrait;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EditScheduleRequest $request)
    {
        //
        $raceIds = $request->raceIds;
        $dates = $request->dates;
        $hours = $request->hours;
        $minutes = $request->minutes;

        foreach ($raceIds as $raceId) {

            $time = Carbon::parse(config('const.START_DAY'));
              // $this->console_log(['var time', $time]); //Debug
            $time->addSecond(
              ($dates[$raceId]-1)*24*60*60
              + $hours[$raceId]*60*60
              + $minutes[$raceId]*60
            );

            Race::where('id', $raceId)->update(['startTime' => $time]);
        }
        return redirect( route('Hole') );
    }
}
