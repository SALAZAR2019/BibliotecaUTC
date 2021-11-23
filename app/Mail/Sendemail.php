<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendemail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Detalles de Prestamo';

    public $detalles;
    public $usuario;
    public $folio;
    public $endDate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detalles,$usuario,$folio,$endDate)
    {
        //
        $this->detalles = $detalles;
        $this->usuario =$usuario;
        $this->folio =$folio;
        $this->endDate =$endDate;
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
