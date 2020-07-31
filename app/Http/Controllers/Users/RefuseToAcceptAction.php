<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entry;

class RefuseToAcceptAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $entry = Entry::find($request->id);
      $entry->delete();

      //**showEntryPage**//
      return redirect( route('Entries') );
    }
}
