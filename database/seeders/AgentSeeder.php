<?php

namespace Database\Seeders;

use App\Models\Agents;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(Agents::all()) >0) return;
        Agents::insert([
            ["name"=>"ONUK", "currency"=>"GBP"],
            ["name"=>"ONSP", "currency"=>"EUR"],
            ["name"=>"ONNK", "currency"=>"NOK"],
            ["name"=>"ONDK", "currency"=>"DKK"],
            ["name"=>"ONSD", "currency"=>"SEK"],
            ["name"=>"ONIR", "currency"=>"EUR"],
            ["name"=>"ONIT", "currency"=>"EUR"],
            ["name"=>"ONFR", "currency"=>"EUR"],
            ["name"=>"ONAT", "currency"=>"EUR"],
            ["name"=>"ONBM", "currency"=>"EUR"],
            ["name"=>"ONBU", "currency"=>"EUR"],
            ["name"=>"ONCR", "currency"=>"EUR"],
            ["name"=>"ONCY", "currency"=>"EUR"],
            ["name"=>"ONCZ", "currency"=>"EUR"],
            ["name"=>"ONET", "currency"=>"EUR"],
            ["name"=>"ONFN", "currency"=>"EUR"],
            ["name"=>"ONGM", "currency"=>"EUR"],
            ["name"=>"ONSL", "currency"=>"EUR"],
            ["name"=>"ONGC", "currency"=>"EUR"],
            ["name"=>"ONHU", "currency"=>"EUR"],
            ["name"=>"ONIC", "currency"=>"EUR"],
            ["name"=>"ONLA", "currency"=>"EUR"],
            ["name"=>"ONSK", "currency"=>"EUR"],
            ["name"=>"ONLT", "currency"=>"EUR"],
            ["name"=>"ONRM", "currency"=>"EUR"],
            ["name"=>"ONPR", "currency"=>"EUR"],
            ["name"=>"ONPL", "currency"=>"EUR"],
            ["name"=>"ONNL", "currency"=>"EUR"],
            ["name"=>"ONML", "currency"=>"EUR"],
            ["name"=>"ONLX", "currency"=>"EUR"],
            ["name"=>"SUV", "currency"=>"CHF"],
            ["name"=>"ONCD", "currency"=>"CAD"],
            ["name"=>"ONUS", "currency"=>"USD"],
            ["name"=>"ONAU", "currency"=>"AUD"],
            ["name"=>"ONCH", "currency"=>"CHF"],
            ["name"=>"KPK", "currency"=>"GBP"],
            ["name"=>"RCO", "currency"=>"GBP"],
            ["name"=>"NEC", "currency"=>"EUR"],
            ["name"=>"ONNZ", "currency"=>"NZD"],
            ["name"=>"Test_1", "currency"=>"EUR"],
            ["name"=>"ONGB", "currency"=>"EUR"],
        ]);
    }
}
