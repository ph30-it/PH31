<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email, $listProduct;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email1, $listProduct1)
    {
        $this->email= $email1;
        $this->listProduct= $listProduct1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.order-mail');
    }
}
