<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\AcceptWithdrawalMail;
use Mail;

class WithdrawalAction extends Controller
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
        $user = \Auth::user();

        $to = [
          [
            'email' => $user->email,
            'name' => $user->name,
          ]
        ];

        $content ='';
        if ($request->content !=null) {
          $content = $request->content;
        }

        Mail::to($to)->bcc('satarboad10@gmail.com')
                     ->send(new AcceptWithdrawalMail($user->name, $content));

        \Auth::logout();
        $user->delete();

        $title = '退会完了';
        $message = '退会を承認しました。';
        $sub_message = '追加のご意見等ございましたら、「お問い合わせ」よりお願いいたします。';
        return view('done', [
          'title' => $title,
          'message' => $message,
          'sub_message' => $sub_message,
        ]);
    }
}
