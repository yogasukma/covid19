<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'terkonfirmasi',
        'perawatan',
        'sembuh',
        'meninggal',
    ];

    public function getLastUpdatedAttribute()
    {
        return date('d/n/Y H:i', strtotime($this->updated_at));
    }
}
