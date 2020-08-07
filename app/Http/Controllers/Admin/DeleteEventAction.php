<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OnlyForAdminRequest;
use App\Event;

class DeleteEventAction extends Controller
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
        $event = Event::find($request->eventId);
        $event->delete();

        return redirect( route('Hole') );
    }
}
