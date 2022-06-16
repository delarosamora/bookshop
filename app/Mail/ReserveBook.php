<?php

namespace App\Mail;

use App\Models\Reserve;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReserveBook extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reserve $reserve)
    {
        $this->subject("NUEVO USUARIO");
        $this->reserve = $reserve;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.reservebook')->with('reserve', $this->reserve);
    }
}
