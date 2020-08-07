<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserInfoRequest;

class EditInfoAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EditUserInfoRequest $request)
    {
        $user = \Auth::user();
        $user->update(['email' => $request->email]);

        //**MyPageへリダイレクト**//
        return redirect( route('Mypage') );
    }
}
