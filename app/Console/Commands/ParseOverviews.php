<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use App\Models\Stock;
use App\Models\StockOverview;
use App\Models\StockOverviewHistory;

class ParseOverviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:overviews';

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
        $s_o = StockOverview::all();
        
        if($s_o != null){
            
            $s_o = $s_o->makeHidden(['id', 'created_at', 'updated_at'])->toArray();
            
            foreach ($s_o as $s) {

                StockOverviewHistory::create($s);
                
                ECHO "copy-". $s['symbol'] .PHP_EOL;
            }
            
            ECHO "copy- success" .PHP_EOL;
        }

        $stocks = Stock::whereNotNull('symbol')->select('id', 'symbol')->get();

        $chunks = $stocks->chunk(10); // limit requests

        foreach ($chunks as $k => $chunk) {
            
            $pool_array = [];

            $i = 0;
            foreach ($chunk as $kk => $ch) {
                $pool_array[] = 'https://backend.otcmarkets.com/otcapi/stock/trade/inside/'.$ch['symbol'].'?symbol='.$ch['symbol'];
                $pool_keys[$i++] = $ch['id'];
            }
            unset($i);

            $responses = Http::pool(fn (Pool $pool) => $this->helper($pool, $pool_array));
            
            
            foreach ($responses as $key => $stock) {

                $array = $stock->json();

                if (isset($array['error']) || !isset($array['symbol'])) 
                {
                    ECHO " - пропуск ошибка " .PHP_EOL;
                    continue;
                }

                $array['stock_id'] = $pool_keys[$key];

                StockOverview::updateOrCreate(['symbol' => $array['symbol']], $array);

                ECHO $array['symbol'].PHP_EOL;
            }

            ECHO "sleep 10 sec " .PHP_EOL;
            sleep(10);

        }

        // update other info
        foreach ($chunks as $key => $value) {
            
            $pool_array = [];
            $data = [];

            $i = 0;
            foreach ($chunk as $kk => $ch) {
                $pool_array[] = 'https://backend.otcmarkets.com/otcapi/stock/trade/inside/'.$ch['symbol'].'?symbol='.$ch['symbol'];
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

                $data['isProfileVerified'] = $array['isProfileVerified'];
                $data['profileVerifiedAsOfDate'] = $array['profileVerifiedAsOfDate'];

                // $data['']

                StockOverview::where('symbol', $array['otcAward']['symbol'])->update($data);

                ECHO $array['otcAward']['symbol'].PHP_EOL;
            }

            ECHO "sleep 10 sec " .PHP_EOL;
            sleep(10);

        }


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
}
