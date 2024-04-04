<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CotacaoMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $cotacao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cotacao)
    {
        $this->cotacao = $cotacao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mailCotacao', $this->cotacao)->subject('Você recebeu mais um cotação para análise');
    }
}