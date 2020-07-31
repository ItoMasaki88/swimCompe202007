<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function __invoke(Request $request)
    {
        //
        $raceIds = $request->raceIds;
        $dates = $request->dates;
        $hours = $request->hours;
        $mins = $request->mins;

        for ($i=0; $i < count($raceIds); $i++) {

            $time = Carbon::parse(config('const.START_DAY'));
              // $this->console_log(['var time', $time]); //Debug
            $time->addSecond(
              ($dates[$i]-1)*24*60*60
              + $hours[$i]*60*60
              + $mins[$i]*60
            );

            Race::where('id', $raceIds[$i])->update(['startTime' => $time]);
        }
        return redirect( route('Hole') );
    }
}
