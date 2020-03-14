<?php

namespace App\Modules;

use App\Mail\UpdateCovid;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;

class SendNotifications
{
    public function queue($data)
    {
        $subscribers = (new SubscriberRepository())->get();

        foreach ($subscribers as $subscriber) {
            Notification::create([
                'recipient' => $subscriber->contact,
                'type' => $subscriber->type,
                'data' => json_encode($data),
                'status' => 'waiting',
            ]);
        }
    }

    public function go()
    {
        $notifications = Notification::where('status', 'waiting')->orderBy('id')->take(10)->get();

        if ($notifications->isEmpty()) {
            return false;
        }

        foreach ($notifications as $notification) {
            Notification::where("id", $notification->id)->update(['status' => 'onprogress']);

            if ($notification->type == 'email') {
                $sent = $this->sendEmail($notification);
            }

            if ($sent) {
                Notification::where("id", $notification->id)->update(['status' => 'sent']);
            }
        }

        return true;
    }

    protected function sendEmail($notification)
    {
        Mail::to($notification->recipient)->send(new UpdateCovid($notification));

        return true;
    }
}
