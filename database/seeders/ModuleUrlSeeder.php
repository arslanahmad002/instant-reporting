<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\ModulesUrl;
use Illuminate\Database\Seeder;

class ModuleUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(ModulesUrl::all()) >0) return;
        $modules_urls = array(
            // array('id' => '16','m_id' => '10','name' => 'admin.module.group.index','url' => '/admin/setting/module/group','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '17','m_id' => '10','name' => 'admin.module.group.create','url' => '/admin/setting/module/group/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '18','m_id' => '10','name' => 'admin.module.group.edit','url' => '/admin/setting/module/group/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '19','m_id' => '10','name' => 'admin.module.group.delete','url' => '/admin/setting/module/group/delete','mode' => '4','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '27','m_id' => '14','name' => 'admin.role.permission.create','url' => '/admin/setting/role/{id}/permission/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '28','m_id' => '14','name' => 'admin.role.permission.edit','url' => '/admin/setting/role/{id}/permission/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '30','m_id' => '11','name' => 'admin.module.url.index','url' => '/admin/setting/module/{id}/url','mode' => '1','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '31','m_id' => '11','name' => 'admin.module.url.create','url' => '/admin/setting/module/{id}/url/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '32','m_id' => '11','name' => 'admin.module.url.edit','url' => '/admin/setting/module/{id}/url/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '33','m_id' => '11','name' => 'admin.module.url.delete','url' => '/admin/setting/module/{id}/url/delete','mode' => '4','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '34','m_id' => '7','name' => 'admin.module.index','url' => '/admin/setting/module','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '35','m_id' => '7','name' => 'admin.module.create','url' => '/admin/setting/module/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '36','m_id' => '7','name' => 'admin.module.edit','url' => '/admin/setting/module/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '37','m_id' => '7','name' => 'admin.module.delete','url' => '/admin/setting/module/delete','mode' => '4','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '38','m_id' => '5','name' => 'admin.role.index','url' => '/admin/setting/role','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '39','m_id' => '5','name' => 'admin.role.edit','url' => '/admin/setting/role/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '40','m_id' => '5','name' => 'admin.role.create','url' => '/admin/setting/role/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '41','m_id' => '5','name' => 'admin.role.delete','url' => '/admin/setting/role/delete','mode' => '4','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '44','m_id' => '2','name' => 'admin.currencies.index','url' => '/admin/currencies','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '59','m_id' => '2','name' => 'admin.currencies.edit','url' => '/admin/currencies/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '60','m_id' => '16','name' => 'admin.currencies.rates.index','url' => '/admin/currencies/rates','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '61','m_id' => '16','name' => 'admin.currencies.rates.edit','url' => '/admin/currencies/rates/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '62','m_id' => '16','name' => 'admin.currencies.rates.create','url' => '/admin/currencies/rates/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '63','m_id' => '17','name' => 'admin.upload_data.transactions.index','url' => '/admin/upload_data/transactions','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '64','m_id' => '18','name' => 'admin.upload_data.transactions.create','url' => '/admin/upload_data/transactions/create','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '65','m_id' => '19','name' => 'admin.upload_data.transactions.files','url' => '/admin/upload_data/transactions/files','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '65','m_id' => '18','name' => 'admin.upload_data.online_customers','url' => '/admin/upload_data/online_customers','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '66','m_id' => '18','name' => 'admin.upload_data.online_customers.create','url' => '/admin/upload_data/online_customers/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '68','m_id' => '4','name' => 'admin.accounts.transactions.receiving.revenue.index','url' => '/admin/accounts/transactions/receiving/revenue','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '69','m_id' => '22','name' => 'admin.accounts.transactions.sending.revenue.index','url' => '/admin/accounts/transactions/sending/revenue','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '70','m_id' => '1','name' => 'admin.dashboard.index','url' => '/admin/dashboard','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '71','m_id' => '26','name' => 'admin.operations.transactions.hourly.index','url' => '/admin/operations/transactions/hourly','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '72','m_id' => '27','name' => 'admin.user.index','url' => '/admin/setting/user','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '73','m_id' => '27','name' => 'admin.user.create','url' => '/admin/setting/user/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '74','m_id' => '27','name' => 'admin.user.edit','url' => '/admin/setting/user/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '75','m_id' => '27','name' => 'admin.user.delete','url' => '/admin/setting/user/delete','mode' => '4','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '76','m_id' => '28','name' => 'admin.operations.transactions.customers.index','url' => '/admin/operations/transactions/customers','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '77','m_id' => '29','name' => 'admin.accounts.transactions.sending.profit_loss.index','url' => '/admin/accounts/transactions/sending/profit_loss','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '78','m_id' => '30','name' => 'admin.accounts.transactions.receiving.profit_loss.index','url' => '/admin/accounts/transactions/receiving/profit_loss','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '80','m_id' => '33','name' => 'admin.buyer.index','url' => '/admin/buyer','mode' => '1','type' => '0','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '81','m_id' => '33','name' => 'admin.buyer.create','url' => '/admin/buyer/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '82','m_id' => '33','name' => 'admin.buyer.edit','url' => '/admin/buyer/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '83','m_id' => '33','name' => 'admin.buyer.delete','url' => '/admin/buyer/delete','mode' => '4','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '85','m_id' => '34','name' => 'admin.buyer.pay_method.index','url' => '/admin/buyer/{id}/pay_method','mode' => '1','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '86','m_id' => '34','name' => 'admin.buyer.pay_method.create','url' => '/admin/buyer/{id}/pay_method/create','mode' => '2','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '87','m_id' => '34','name' => 'admin.buyer.pay_method.edit','url' => '/admin/buyer/{id}/pay_method/edit','mode' => '3','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '88','m_id' => '34','name' => 'admin.buyer.pay_method.delete','url' => '/admin/buyer/{id}/pay_method/delete','mode' => '4','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '89','m_id' => '35','name' => 'admin.profile.index','url' => '/admin/profile','mode' => '1','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            // array('id' => '94','m_id' => '36','name' => 'admin.buyer.report.index','url' => '/admin/buyer/{id}/report','mode' => '1','type' => '1','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL)
        );
        ModulesUrl::insert($modules_urls);
    }
}
