<?php

namespace App\Mail;

use App\Order;
use App\Restaurant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $restaurant = null;
    protected $order = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $restaurantId, Order $order)
    {
        $this->restaurant = Restaurant::find($restaurantId);
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
            ->subject('Conferma Ordine')
            ->view('mail.order-confirm', [
                'restaurant' => $this->restaurant,
                'order' => $this->order
            ]);
    }
}
