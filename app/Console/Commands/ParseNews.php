<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use App\Models\StockOverview;
use App\Models\StockNews;

class ParseNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:news';

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

        $stocks = StockOverview::whereNotNull('symbol')->select('id', 'symbol', 'stock_id')->get();

        $chunks = $stocks->chunk(10); // limit requests

        foreach ($chunks as $k => $chunk) {
            
            $pool_array = [];

            $i = 0;
            foreach ($chunk as $kk => $ch) {
                $pool_array[] = 'https://backend.otcmarkets.com/otcapi/company/'.$ch['symbol'].'/dns/news?symbol='.$ch['symbol'];
                $pool_keys[$i++] = $ch['stock_id'];
            }
            unset($i);

            $responses = Http::pool(fn (Pool $pool) => $this->helper($pool, $pool_array));
            
            
            foreach ($responses as $key => $stock) {

                $array = $stock->json();

                if (isset($array['error'])) 
                {
                    ECHO " - пропуск ошибка " .PHP_EOL;
                    continue;
                }

                if (!isset($array['records']))
                {
                    ECHO " - пропуск пусто " .PHP_EOL;
                    continue;
                }

                foreach ($array['records'] as $k => $record) {
                    
                    $record['stock_id'] = $pool_keys[$key];
                    $record['original_id'] = $record['id'];

                    unset($record['id']);

                    StockNews::updateOrCreate(['original_id' => $record['original_id']], $record);
                }


                ECHO count($array['records']).PHP_EOL;
            }

            ECHO "sleep 5 sec " .PHP_EOL;
            sleep(5);

        }

        //get contents
        $this->getNewsContent();


        return 1;
    }

    public function helper($pool, $pool_array)
    {
        $arr = [];

        foreach ($pool_array as $key => $value) {
            $arr[] = $pool->get($pool_array[$key]);
        }

        return $arr;
    }

    public function getNewsContent()
    {

        $stocks = StockNews::select('id', 'original_id', 'stock_id')->get();

        $chunks = $stocks->chunk(50);

        foreach ($chunks as $k => $chunk) {
            
            $pool_array = [];

            $i = 0;
            foreach ($chunk as $kk => $ch) {
                $pool_array[] = 'https://backend.otcmarkets.com/otcapi/company/dns/news/content/'.$ch['original_id'].'?newsId='.$ch['original_id'];
                $pool_keys[$i++] = $ch['original_id'];
            }
            unset($i);

            $responses = Http::pool(fn (Pool $pool) => $this->helper($pool, $pool_array));
            
            
            foreach ($responses as $key => $stock) {

                $content = $stock->body();

                if (is_null($content)) 
                {
                    ECHO " - пропуск ошибка " .PHP_EOL;
                    continue;
                }

                StockNews::where('original_id', $pool_keys[$key])->update(['content' => $content]);

                ECHO $pool_keys[$key].PHP_EOL;
            }

            ECHO "sleep 5 sec " .PHP_EOL;
            sleep(5);

        }
    }
}