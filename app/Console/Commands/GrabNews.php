<?php

namespace App\Console\Commands;

use App\Modules\NewsSeeker;
use Illuminate\Console\Command;

class GrabNews extends Command
{
    /**
     * The name and signature of the console command.
     * url parameter is optional, when it used, it will only test to grab the news, not save it.
     *
     * @var string
     */
    protected $signature = 'grab:news {url?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Downloading data from some news media';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // if artisan has $url parameter, then use it as test, 
        // not save it.
        if(!is_null($this->argument("url"))) {
            $this->testRssUrl($this->argument("url"));

            return false;
        }

        // run the scrappers
        // save the results.
        (new NewsSeeker())->get();
    }

    protected function testRssUrl($url)
    {
        $feeds = (new NewsSeeker())->getFeed($url);

        if ($feeds) {
            foreach ($feeds->get_items() as $feed) {
                $this->info($feed->get_title());
            }
        }
    }
}
