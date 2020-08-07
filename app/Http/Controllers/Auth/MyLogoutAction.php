<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyLogoutAction extends Controller
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
        \Auth::logout();

        $title = 'ログアウト完了';
        $message = 'ログアウト処理を受け付けました。';
        return view('done', [
          'title' => $title,
          'message' => $message,
        ]);
    }
}
