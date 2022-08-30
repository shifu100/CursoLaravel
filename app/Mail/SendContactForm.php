<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactForm extends Mailable
{
    use Queueable, SerializesModels;
/**
*@var string
*/

    public string $textSubject;

/**
*@var string
*/ 

    public string $textMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     * @param string $subject
     * @param string $message
     */
    //Pasar datos de entrada a mailable por el constructor
    public function __construct(string $subject, string $message)
    {
        //
        $this->textSubject = $subject;
        $this->textMessage = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("Formulario de contacto - " .config("app.name"))
            ->markdown("emails.contact");
    }
}
