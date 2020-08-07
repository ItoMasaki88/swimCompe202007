<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResposeInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $content)
    {
        //
        $this->name = $name;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.respond-inquiry')
                    ->subject('【SwimCompe】お問い合わせいただきありがとうございます')
                    ->with([
                        'content' => $this->content,
                        'name' => $this->name,
                      ]);
    }
}
