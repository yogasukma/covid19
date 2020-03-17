<?php

namespace App\Mail;

use Carbon\Carbon;
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
            ->subject('Update Covid '.Carbon::now()->addHours(8)->format('d/n/Y H:i'))
            ->view('notifications.email.' . $this->notification->format)
            ->with(['data' => json_decode($this->notification->data)]);
    }
}
