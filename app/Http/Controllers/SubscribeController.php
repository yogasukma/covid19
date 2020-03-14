<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\SubscriberRepository;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'contact' => 'required|email',
        ], [
            'required' => 'Form email harus diisi',
            'email' => 'Form email harus diisi email valid',
        ]);

        (new SubscriberRepository())->add($request->all());

        return response('Ok, email tersimpan');
    }
}
