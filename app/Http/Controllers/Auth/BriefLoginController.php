<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;


class BriefLoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = 'users/events'; //RouteServiceProvider::HOME

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('guest')->except('logout');
  }

  /**
   *
   * @param  \Illuminate\Http\Request $request
   *
   * @return Response
   */
  public function player_authenticate(Request $request)
  {
      if(Auth::attempt(['email'=>'guest@gmail.com', 'password'=>'guest134pass'])){
          return redirect()->route('Events');//リダイレクト先は好きなところへ
      }else{
          return redirect()->back()->with('ログインに失敗しました');
      }
  }

  /**
   *
   * @param  \Illuminate\Http\Request $request
   *
   * @return Response
   */
  public function admin_authenticate(Request $request)
  {
      if(Auth::attempt(['email'=>'admin@gmail.com', 'password'=>'admin321'])){
          return redirect()->route('Events');//リダイレクト先は好きなところへ
      }else{
          return redirect()->back()->with('ログインに失敗しました');
      }
  }

}
