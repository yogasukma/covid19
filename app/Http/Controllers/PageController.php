<?php

namespace App\Http\Controllers;

use App\Modules\DataViewer;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'patient' => (new DataViewer())->getPatients(),
            'byGender' => (new DataViewer())->getMetas('gender'),
            'byCluster' => (new DataViewer())->getMetas('cluster'),
            'byProvince' => (new DataViewer())->getMetas('province'),
        ]);
    }
}
