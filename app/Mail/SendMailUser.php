<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $client)
    {
        $this->user = $user;
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('CARRO CERTO APP - SITUAÇÃO SOLICITAÇÃO DE CADASTRO')
                    ->from('sac@carrocertoapp.com.br')
                    ->view('emails.welcome')
                    ->with([
                        'user' => $this->user,
                        'client' => $this->client,
                    ]);
    }
}
