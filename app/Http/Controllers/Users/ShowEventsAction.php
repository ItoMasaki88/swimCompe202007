<?php

namespace App\Http\Controllers\Users;

use App\Event;
use App\Traits\MyTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ShowEventsAction extends Controller
{
     use myTrait;

    /**
     * 指定ユーザーのプロフィール表示
     *
     * @param
     * @return View
     */
    public function __invoke()
    {
      $events = Event::all();

      $eventsAndStatuses = array();
      if (\Auth::check()) {
        foreach ($events as $event) {
          array_push($eventsAndStatuses, [
            'event' => $event,
            'status' => $this->entryStatus(\Auth::user(), $event),
          ]);
        }
        return view('Users/events', ['eventsAndStatuses' => $eventsAndStatuses,]);
      }

      foreach ($events as $event) {
        array_push($eventsAndStatuses, [
          'event' => $event,
          'status' => '',
        ]);
      }
      return view('Users.events', ['eventsAndStatuses' => $eventsAndStatuses,]);
    }

}
