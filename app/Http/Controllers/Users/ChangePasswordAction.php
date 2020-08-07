<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ChangePassRequest $request)
    {
      $user = \Auth::user();
      $user->update(['password' => Hash::make($request->new_password)]);

      //**MyPageへリダイレクト**//
      return redirect( route('Mypage') );
    }
}
