<?php

namespace Servicio\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Servicio\Feedback;

class email extends Mailable
{
    use Queueable, SerializesModels;

  
    public $feedback;
 
    public function __construct(Feedback $feedback)
    {
        $this->feedback=$feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('contact.email');
        // ->with([
        //     'fullname' => $this->order->name,
        //     'orderPrice' => $this->order->price,
        // ]);
       
    }
}
