<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderRequest extends Mailable
{
    use Queueable, SerializesModels;

    protected $order = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('deliveboo@boolean.careers')
            ->subject('Richiesta Ordine')
            ->view('mail.order-request', [
                'order' => $this->order
            ]);
    }
}
