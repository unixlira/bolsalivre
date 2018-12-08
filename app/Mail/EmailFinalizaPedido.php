<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailFinalizaPedido extends Mailable
{
    use Queueable, SerializesModels;
    public $currentuser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($currentuser)
    {
        $this->currentuser = $currentuser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.finalizaPedido');
    }
}
