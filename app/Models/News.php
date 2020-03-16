<?php

namespace App\Models;

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
        return $this->getAttribute("created_at")->addHours(8)->format("H:i d/n/Y");
    }
}

