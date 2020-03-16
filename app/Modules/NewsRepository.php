<?php

namespace App\Modules;

use App\Models\News;

class NewsRepository
{
    public function get()
    {
        return News::whereNotNull("regional")
            ->orderBy("regional")
            ->orderBy("published_at", 'desc')
            ->get()
            ->mapToGroups(function($item, $key){
            return [$item["regional"] => $item];
        });
    }

    public function getKemkesNews()
    {
        return News::where("source", "kemkes")
            ->orderBy('created_at', 'desc')
            ->first();
    }
}