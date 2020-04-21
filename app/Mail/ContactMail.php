<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $phone;
    protected $email;
    protected $link;
    protected $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $link, $msg)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->link = $link;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('web.receive')
            ->from($this->email)
            ->subject('Message from web site')
            ->with([
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'link' => $this->link,
                'msg' => $this->msg,
            ]);
    }
}
