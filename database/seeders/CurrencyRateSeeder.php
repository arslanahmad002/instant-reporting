<?php

namespace Database\Seeders;

use App\Models\CurrenciesRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencyRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (count(CurrenciesRate::all()) > 0)  return;
        $currencies_rates = array(
            array('id' => '2','c_id' => '234','iso' => 'GB','iso3' => 'GBR','currency' => 'GBP','dated' => '2022-10-25','rate' => '1.00','status' => '1','created_at' => '2022-10-25 05:50:19','updated_at' => '2022-10-25 05:50:19','deleted_at' => NULL),
            array('id' => '19','c_id' => '235','iso' => 'US','iso3' => 'USA','currency' => 'USD','dated' => '2022-10-31','rate' => '1.12','status' => '1','created_at' => '2022-10-31 07:14:01','updated_at' => '2022-10-31 07:14:01','deleted_at' => NULL),
            array('id' => '20','c_id' => '5','iso' => 'AD','iso3' => 'AND','currency' => 'EUR','dated' => '2022-10-31','rate' => '1.14','status' => '1','created_at' => '2022-10-31 07:16:13','updated_at' => '2022-10-31 07:16:13','deleted_at' => NULL),
            array('id' => '21','c_id' => '3','iso' => 'DZ','iso3' => 'DZA','currency' => 'DZD','dated' => '2022-10-31','rate' => '29.00','status' => '1','created_at' => '2022-10-31 07:38:22','updated_at' => '2022-10-31 07:38:22','deleted_at' => NULL),
            array('id' => '22','c_id' => '2','iso' => 'AL','iso3' => 'ALB','currency' => 'ALL','dated' => '2022-10-31','rate' => '8.45','status' => '1','created_at' => '2022-10-31 07:44:50','updated_at' => '2022-10-31 08:00:26','deleted_at' => NULL),
            array('id' => '23','c_id' => '60','iso' => 'DK','iso3' => 'DNK','currency' => 'DKK','dated' => '2022-10-31','rate' => '8.45','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '25','c_id' => '165','iso' => 'NO','iso3' => 'NOR','currency' => 'NOK','dated' => '2022-10-31','rate' => '11.91','status' => '1','created_at' => '2022-10-31 08:09:24','updated_at' => '2022-10-31 08:09:24','deleted_at' => NULL),
            array('id' => '26','c_id' => '214','iso' => 'SE','iso3' => 'SWE','currency' => 'SEK','dated' => '2022-10-31','rate' => '12.41','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '27','c_id' => '215','iso' => 'CH','iso3' => 'CHE','currency' => 'CHF','dated' => '2022-10-31','rate' => '1.09','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '28','c_id' => '39','iso' => 'CA','iso3' => 'CAN','currency' => 'CAD','dated' => '2022-10-31','rate' => '1.53','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '29','c_id' => '13','iso' => 'AU','iso3' => 'AUS','currency' => 'AUD','dated' => '2022-10-31','rate' => '1.73','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '31','c_id' => '222','iso' => 'TG','iso3' => 'TGO','currency' => 'XOF','dated' => '2023-02-07','rate' => '0.00','status' => '1','created_at' => '2023-02-07 07:54:52','updated_at' => '2023-02-07 07:54:52','deleted_at' => NULL)
        );
        CurrenciesRate::insert($currencies_rates);
    }
}
