<?php

namespace App\Console\Commands;

use App\Modules\KawalCovid;
use Illuminate\Console\Command;

class GrabKawalCovid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grab:kawalcovid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Downloading data from kawalcovid.id';

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
        (new KawalCovid())->get();
    }
}
