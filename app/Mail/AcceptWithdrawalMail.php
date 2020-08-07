<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptWithdrawalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $content ='')
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
      return $this->view('mails.accept-withdrowal')
                  ->subject('【SwimCompe】退会を承認しました')
                  ->with([
                      'content' => $this->content,
                      'name' => $this->name,
                    ]);
    }
}
