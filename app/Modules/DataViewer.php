<?php

namespace App\Modules;

use App\Models\Meta;
use App\Models\Patient;

class DataViewer
{
    public function getPatients($date = null)
    {
        if (is_null($date)) {
            $date = date('Y-m-d');
        }

        return Patient::orderBy('id', 'desc')->first();
    }

    public function getMetas($type)
    {
        return Meta::where('type', $type)->orderBy('qty', 'desc')->get()->pluck('qty', 'label');
    }
}
