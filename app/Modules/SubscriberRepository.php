<?php

namespace App\Modules;

use App\Models\Subscriber;

class SubscriberRepository
{
    public function add($data)
    {
        Subscriber::updateOrCreate([
            'contact' => $data['contact'],
            'type' => 'email',
        ]);
    }

    public function get()
    {
        return Subscriber::all();
    }
}
