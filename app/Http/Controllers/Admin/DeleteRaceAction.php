<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OnlyForAdminRequest;
use App\Race;

class DeleteRaceAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(OnlyForAdminRequest $request)
    {
        //
        $race = Race::find($request->raceId);
        $race->delete();

        return redirect( route('Hole') );
    }
}
