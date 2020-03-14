<?php

namespace App\Modules;

use App\Models\Meta;
use App\Models\Patient;

class UpdateData
{
    public function save($data)
    {
        $this->updatePatient($data['patients']);
        $this->updateMeta($data['meta']);
    }

    public function updatePatient($patients)
    {
        $patient = Patient::whereDate('created_at', '=', date('Y-m-d'))->first();

        empty($patient)
            ? Patient::create($patients)
            : Patient::where('id', $patient->id)->update($patients);
    }

    public function updateMeta($meta)
    {
        foreach ($meta as $type => $stats) {
            foreach ($stats as $label => $qty) {
                Meta::updateOrCreate(
                    [
                        'label' => $label,
                        'qty' => $qty,
                    ],
                    [
                        'type' => $type,
                    ]
                );
            }
        }
    }
}
