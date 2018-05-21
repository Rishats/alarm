<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Recipient;

class NotificationWarned extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The $notification array.
     *
     * @var $notification
     */
    public $notification;

    /**
     * NotificationWarned constructor.
     * @param array $notification
     */
    public function __construct(array $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notification.warned', compact('notification'));
    }
}
