<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendemail extends Mailable
{
    use Queueable, SerializesModels;

    public $records;
    public $usuario;
    public $folio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($records,$usuario,$folio)
    {
        //
        $this->records = $records;
        $this->usuario =$usuario;
        $this->folio =$folio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email');
    }
}
