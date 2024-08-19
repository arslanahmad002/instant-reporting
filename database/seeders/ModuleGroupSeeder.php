<?php

namespace Database\Seeders;

use App\Models\ModulesGroup;
use Illuminate\Database\Seeder;

class ModuleGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(ModulesGroup::all()) > 0) return;
        $data = [
        //    ['id' => 1, 'name' => 'Dashboard', 'icon' => 'fas fa-tachometer-alt', 'status' => 1, 'sort' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            [1, 'Dashboard', 'fas fa-tachometer-alt', 1, 1, NULL, '2023-03-07 11:44:52', NULL],
            // [2, 'Currency', 'fas fa-exchange-alt', 2, 1, NULL, '2023-03-07 11:44:59', NULL],
            // [4, 'Accounts', 'fas fa-file-invoice', 4, 1, NULL, '2023-03-07 11:21:11', NULL],
            // [5, 'Setting', 'fas fa-cogs', 6, 1, NULL, '2023-03-07 11:21:11', NULL],
            [21, 'Upload Data', 'fas fa-upload', 3, 1, NULL, '2023-03-07 11:44:59', NULL],
            // [23, 'Operations', 'fas fa-file-invoice', 5, 0, NULL, '2023-03-07 11:21:11', NULL]
        ];
        $modules_group = [];
        foreach ($data as $key => $value) {
            $modules_group[] =
                [
                    'id' => $value[0],
                    'name' => $value[1],
                    'icon' => $value[2],
                    'sort' => $value[3],
                    'status' => $value[4],
                    'created_at' => $value[5],
                    'updated_at' => $value[6],
                    'deleted_at' => $value[7],
                    ];
        }
        ModulesGroup::insert($modules_group);
    }
}
