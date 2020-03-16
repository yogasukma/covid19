<?php

namespace App\Modules;

use App\Models\Meta;
use App\Models\Patient;

class UpdateData
{
    protected $diff = [];

    public function save($data)
    {
        $this->findDiff($data['patients']);
        $this->updatePatient($data['patients']);
        // $this->updateMeta($data['meta']);

        if (!empty($this->diff)) {
            (new SendNotifications())->queue($this->diff);
        }
    }

    protected function findDiff($patients)
    {
        $previousPatients = (new DataViewer())->getPatients();

        foreach (['terkonfirmasi', 'perawatan', 'sembuh', 'meninggal'] as $field) {
            if ($patients[$field] != $previousPatients[$field]) {
                $selisih = $patients[$field] - $previousPatients[$field];
                $operator = $selisih > 0 ? 'penambahan' : 'pengurangan';

                $this->diff[$field] = 'ada '.$operator.' '.abs($selisih).' kasus '.$field.' menjadi '.$patients[$field].' kasus '.$field .'.';
            }
        }
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
