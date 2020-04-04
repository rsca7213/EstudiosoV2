<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class forgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $pass;

    public function __construct($name, $pass)
    {
        $this->name = $name;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('estudioso@estudioso.com', 'Estudioso')
            ->subject('Olvidar Contraseña')
            ->markdown('auth.forgotMail')
            ->with([
                'name' => $this->name,
                'password' => $this->pass
            ]);
    }
}
