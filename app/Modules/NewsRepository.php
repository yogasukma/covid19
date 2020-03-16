<?php

namespace App\Modules;

use App\Models\News;

class NewsRepository
{
    public function get()
    {
        return News::whereNotNull("regional")->orderBy("regional")->get()->mapToGroups(function($item, $key){
            return [$item["regional"] => $item];
        });
    }
}