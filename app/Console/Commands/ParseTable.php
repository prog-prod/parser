<?php

namespace App\Console\Commands;

use App\Jobs\Parser\StockParseJob;
use Illuminate\Console\Command;

class ParseTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running job which parsing all stocks.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return bool
     */
    public function handle() : bool
    {
        StockParseJob::dispatch();

        return true;
    }
}
