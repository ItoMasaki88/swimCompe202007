<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Race;
use App\Entry;
use Illuminate\Support\Facades\Auth;
use App\Traits\MyTrait;

class MakeEntriesAction extends Controller
{
    use myTrait;

    /**
     * 種目一覧でボタン押したら登録処理をする
     *
     * @param
     * @return View
     */
    public function __invoke(Request $request)
    {
      $user = \Auth::user();

      foreach ($request->eventIDs as $eventId) {
        $event = Event::find($eventId);

        $status = $this->entryStatus($user, $event);
        if ($status == 0 && $status == 2) return view('app.error');

        $race_id = $event->entry_race_id;
        Entry::create([
          'user_id' => $user->id,
          'race_id' => $race_id,
          'laneNo' => count(Race::find($race_id)->entries) +1,
        ]);
      }

      //**showEntryPage**//
      return redirect( route('Entries') );
    }

}
