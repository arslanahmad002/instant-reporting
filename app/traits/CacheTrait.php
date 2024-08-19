<?php

namespace App\traits;

use App\Models\CurrenciesRate;
use App\Models\Currency;
use App\Models\TransactionsData;
use Illuminate\Support\Facades\Cache;

trait CacheTrait
{

    public function getCurrenciesCache(){
       return  Cache::remember('currencies-with-rates',86400,function (){
            return Currency::with(['rates'])->get();
        });
    }

    public function getCurrenciesRatesCache(){
        return  Cache::remember('currencies-rates',86400,function (){
            return CurrenciesRate::where('status',1)->get();
        });
    }

    public function getAgentsCache(){
        return  Cache::remember('agents',86400,function (){
            return Currency::get();
        });
    }

    public function getReceivingCountriesCache(){
        return  Cache::remember('receiving_countries',86400,function (){
            return TransactionsData::select('receiving_country')->distinct()->orderBy('receiving_country','ASC')->get();
        });
    }  public function getSendingCountriesCache(){
        return  Cache::remember('sending_countries',86400,function (){
            return TransactionsData::select('sending_country')->distinct()->orderBy('sending_country','ASC')->get();
        });
    }
}
