<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Modules\NewsSeeker;
use Illuminate\Console\Command;

class UpdateNewsRegion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regional:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset regional from the news';

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
        foreach (News::all() as $news) {
            $regional = (new NewsSeeker())->getRegionalArea($news->title);

            $this->info("[" . $regional . "] " . $news->title);


            News::where("id", $news->id)->update([
                "regional" => $regional 
            ]);
        }
    }
}
