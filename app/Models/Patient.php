<?php

namespace App\Models;

use Carbon\Carbon;
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
        // not sure yet, it seems lumen has some timezone issues?
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->getAttribute('updated_at'))->addHours(8)->format('d/n/Y H:i');
    }
}
