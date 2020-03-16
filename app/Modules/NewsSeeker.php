<?php

namespace App\Modules;

use SimplePie;
use App\Models\News;
use App\Modules\SendNotifications;
use Illuminate\Support\Facades\Log;

class NewsSeeker
{
    public function get()
    {
        foreach(config("media") as $source => $media) {
            $feed = $this->getFeed($media["rss_url"]);

            if (!$feed) {
                return false;
            }

            foreach ($feed->get_items() as $item) {
                if (
                    strpos(strtolower($item->get_description()), "corona") !== false 
                    || strpos(strtolower($item->get_description()), "covid") !== false
                ) {

                    Log::info("[" . $source . "] " . $item->get_title());

                    $data = [
                        "title"           => $item->get_title(),
                        "link"            => $item->get_link(),
                        "thumbnail"       => $item->get_enclosure()->get_link(),
                        "description"     => strip_tags($item->get_description()),
                        "published_at"    => $item->get_date("Y-m-d H:i:s"),
                        "regional"        => $this->getRegionalArea($item->get_title())
                    ];

                    // @TODO: need better saving method to save database queries
                    News::updateOrCreate([
                        "source" => $source, "guid" => $item->get_id()
                    ], $data);

                }
            }
        }
    }

    public function getFeed($rssUrl)
    {
        $feed = new SimplePie();
        $feed->set_feed_url($rssUrl);
        $feed->enable_cache(false);
        $feed->set_output_encoding('utf-8');
        $feed->init();

        return $feed;
    }

    public function getRegionalArea($title)
    {
        // @TODO Need better way to mapping news here..
        foreach (config("regional") as $key => $regional) {
            if (strpos(strtoupper(" " . $title . " ")," ". $key . " ") !== false) {
                return $regional;
            }
        }

        return null;
    }
}