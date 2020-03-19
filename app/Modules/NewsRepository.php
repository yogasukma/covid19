<?php

namespace App\Modules;

use App\Models\News;
use Illuminate\Support\Facades\Cache;

class NewsRepository
{
    public function get()
    {
        return Cache::remember("news", 600, function() {
            return News::whereNotNull("regional")
                ->orderBy("regional")
                ->orderBy("published_at", 'desc')
                ->get()
                ->mapToGroups(function($item, $key){
                    return [$item["regional"] => $item];
                });
        });
    }

    public function getKemkesNews()
    {
        return News::where("source", "kemkes")
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function getFeeds()
    {
        return News::whereNotNull("regional")->orderBy("published_at", "desc")->take(10)->get();
    }
}