<?php


namespace App\Traits;


trait StockHistoryTrait
{


    public function to_single_array($array, $parent_key= '', $glue = '.'){
        $result = [];
        foreach ($array as $key => $val){
            if (is_array($val)) {
                if(!$parent_key) $glue = '';
                $result = array_merge($result, $this->to_single_array($val,$parent_key.$glue.$key));
                continue;
            }
            if($parent_key){
                $result[$parent_key.$glue.$key] = $val;
            }else {
                $result[$key] = $val;
            }
        }

        return $result;
    }

    public function casts_array($array){

        $casts = collect($this->casts)->filter(function ($v) { return $v === 'array';} )->toArray();

        foreach ($casts as $key => $cast) {
            $array[$key] = collect($array[$key])->jsonSerialize();
        }

        return $array;

    }
}
