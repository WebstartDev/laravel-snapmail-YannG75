<?php

namespace App\Mail;

use App\MessageData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     *
     * @return void
     */
    public $messageData;

    public function __construct(messageData $messageData)
    {
        $this->messageData = $messageData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mail')
            ->subject('Snapmail Notification')
            ->with([
                'name' => $this->messageData->name,
                'code' => $this->messageData->code,
            ]);


    }
}
