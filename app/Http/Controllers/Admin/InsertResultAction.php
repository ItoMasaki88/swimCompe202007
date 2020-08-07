<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Entry;

class InsertResultAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ResultRequest $request)
    {
      $ids = $request->entryIds;
      $mins = $request->mins;
      $secs = $request->secs;

      for ($i=0; $i <count($ids); $i++) {
        // code...
        if (isset($mins[$i])) {
          $min = (float) $mins[$i];
        } else {
          $min = 0;
        }
        if (isset($secs[$i])) {
          $sec = (float) $secs[$i];
        } else {
          $sec = 0;
        }

        if ($min+$sec != 0) {
          Entry::where('id', $ids[$i])->update(['result' => $min*60 + $sec]);
        }
      }
      return redirect( route('Hole') );
    }
}
