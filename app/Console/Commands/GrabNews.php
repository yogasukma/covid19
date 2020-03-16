<?php

namespace App\Console\Commands;

use App\Modules\NewsSeeker;
use Illuminate\Console\Command;

class GrabNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grab:news';

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
        (new NewsSeeker())->get();
    }
}
