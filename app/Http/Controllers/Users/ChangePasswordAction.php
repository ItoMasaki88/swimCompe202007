<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class ChangePasswordAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      // バリデーションルールの定義
      // passwordに[match_pass]というユーザールールを追加
      $rules = [
        'old_password' => ['required', 'match_pass',],
      ];

      // ユーザールール[match_pass]の定義
      Validator::extend('match_pass', function($attribute, $value, $parameters) {
        // パスワードが登録されているものと一致すれば True
        return Hash::check($value, \Auth::user()->password);
      });

      // バリデーションメソッドを利用
      $this->validate($request, $rules);


      $user = \Auth::user();
      $user->password = Hash::make($request->new_password);
      $user->save();

      //**MyPageへリダイレクト**//
      return redirect( route('Mypage') );
    }
}
