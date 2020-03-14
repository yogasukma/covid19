<?php

namespace App\Mail;

use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateCovid extends Mailable
{
    use Queueable, SerializesModels;

    protected $notification;

    /**
     * Create a new message instance.
     */
    public function __construct(Notification $notification)
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
        return $this
            ->subject('Update Covid '.date('d/n/Y H:i'))
            ->view('notifications.email.update')
            ->with(['notification' => $this->notification]);
    }
}
