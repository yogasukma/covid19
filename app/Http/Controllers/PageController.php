<?php

namespace App\Http\Controllers;

use App\Modules\DataViewer;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'patient' => (new DataViewer())->getPatients(),
        ]);
    }
}
