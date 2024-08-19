<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\ModulesGroup;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(Module::all()) >0) return;
        $modules = array(
            array('id' => '1','m_g_id' => '1','name' => 'Dashboard','icon' => 'fas fa-tachometer-alt nav-icon','sort' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '2','m_g_id' => '2','name' => 'Currencies','icon' => 'fas fa-exchange-alt','sort' => '2','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '4','m_g_id' => '4','name' => 'Receiving Revenue','icon' => 'fas fa-file-invoice nav-icon','sort' => '9','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '5','m_g_id' => '5','name' => 'Roles','icon' => 'fas fa-user-secret nav- icon','sort' => '15','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '7','m_g_id' => '5','name' => 'Modules','icon' => 'fas fa-object-ungroup','sort' => '17','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '10','m_g_id' => '5','name' => 'Module Groups','icon' => 'fas fa-object-group nav-icon','sort' => '18','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '11','m_g_id' => '5','name' => 'Modules URL','icon' => 'fas fa-link','sort' => '19','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '14','m_g_id' => '5','name' => 'Permissions','icon' => 'fas fa-unlock-alt','sort' => '20','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '16','m_g_id' => '2','name' => 'Rates','icon' => 'fas fa-money-bill-wave-alt','sort' => '3','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '17','m_g_id' => '21','name' => 'Transaction','icon' => 'fas fa-money-bill-wave-alt nav-icon','sort' => '7','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '18','m_g_id' => '21','name' => 'Online Customers','icon' => 'fas fa-user','sort' => '8','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '19','m_g_id' => '21','name' => 'Transaction Files','icon' => 'fas fa-file','sort' => '9','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '22','m_g_id' => '4','name' => 'Sending Revenue','icon' => 'fas fa-file-invoice nav-icon','sort' => '10','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '26','m_g_id' => '23','name' => 'Hourly Transactions','icon' => 'fas fa-file-invoice','sort' => '13','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '27','m_g_id' => '5','name' => 'Users','icon' => 'fas fa-user','sort' => '16','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '28','m_g_id' => '23','name' => 'Customer Transactions','icon' => 'fas fa-file-invoice','sort' => '14','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '29','m_g_id' => '4','name' => 'Sending Profit & Loss','icon' => 'fas fa-balance-scale-left','sort' => '11','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '30','m_g_id' => '4','name' => 'Receiving Profit & Loss','icon' => 'fas fa-balance-scale-left','sort' => '12','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '33','m_g_id' => '2','name' => 'Buyers','icon' => 'fa fa-user-secret','sort' => '4','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '34','m_g_id' => '2','name' => 'Payment Methods','icon' => 'fas fa-money-bill','sort' => '5','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '35','m_g_id' => '5','name' => 'Profile','icon' => 'fas fa-user','sort' => '21','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '36','m_g_id' => '2','name' => 'Buyer Report','icon' => 'fas fa-file-invoice nav-icon','sort' => '6','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL)
        );
        Module::insert($modules);
    }
}
