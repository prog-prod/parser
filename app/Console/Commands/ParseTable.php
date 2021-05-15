<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Stock;

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
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {

        $response = Http::get('https://www.otcmarkets.com/research/stock-screener/api', [
            'pageSize' => 15000,
            'market' => '6,5,2,1,10,20,21,22,40'
        ]);

        $array = json_decode($response->json(), true);
        
        foreach ($array['stocks'] as $key => $value) {
            
            Stock::insert($value);

            ECHO $key.PHP_EOL;
        }

        return 'Inserted: count '.$array['count'];

    }
}
