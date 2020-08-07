<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\InquiryRequest;
use App\Mail\ResposeInquiryMail;
use Mail;

class SendInquiryAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(InquiryRequest $request)
    {
        //
        $to = [
          [
            'email' => $request->email,
            'name' => $request->name,
          ]
        ];

        Mail::to($to)->bcc('satarboad10@gmail.com')
                     ->send(new ResposeInquiryMail($request->name, $request->content));

        $title = 'メール送信完了';
        $message = 'お問い合わせを受け付けました。';
        $sub_message = 'しばらくお待ちいただいたのち、返信メールをご確認ください。';
        return view('done', [
          'title' => $title,
          'message' => $message,
          'sub_message' => $sub_message,
        ]);
    }
}
