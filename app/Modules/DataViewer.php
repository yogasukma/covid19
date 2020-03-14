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

        return Patient::whereDate('created_at', '=', $date)->first();
    }

    public function getMetas($type)
    {
        return Meta::where('type', $type)->orderBy('label')->get()->pluck('qty', 'label');
    }
}
