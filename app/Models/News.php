<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        "source",
        "title",
        "link",
        "guid",
        "thumbnail",
        "description",
        "published_at",
        "regional"
    ];
    
    public function getDateAttribute()
    {
         $date = !is_null($this->getAttribute("published_at"))
            ? Carbon::createFromFormat("Y-m-d H:i:s", $this->getAttribute("published_at"))
            : $this->getAttribute("created_at");

        return $date->addHours(8)->format("H:i d/n/Y");
    }
}

