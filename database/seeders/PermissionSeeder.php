<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()


    {
        if (count(Permission::all()) > 0) return;
        $data = [
//            ['id' => 1, 'r_id' => 1, 'm_id' => 1, 'view' => 1, 'add' => NULL, 'edit' => NULL, 'delete' => NULL, 'created_at' => NULL, 'updated_at' => NULL],
//            ['id' => 2, 'r_id' => 1, 'm_id' => 2, 'view' => 1, 'add' => 1, 'edit' => 1, 'delete' => 1, 'created_at' => NULL, 'updated_at' => NULL],
//            ['id' => 3, 'r_id' => 1, 'm_id' => 3, 'view' => 1, 'add' => 1, 'edit' => 1, 'delete' => 1, 'created_at' => NULL, 'updated_at' => NULL],
//            ['id' => 4, 'r_id' => 1, 'm_id' => 4, 'view' => 1, 'add' => 1, 'edit' => 1, 'delete' => 1, 'created_at' => NULL, 'updated_at' => NULL],
//            ['id' => 5, 'r_id' => 1, 'm_id' => 5, 'view' => 1, 'add' => 1, 'edit' => 1, 'delete' => 1, 'created_at' => NULL, 'updated_at' => NULL],
//            ['id' => 6, 'r_id' => 1, 'm_id' => 6, 'view' => 1, 'add' => 1, 'edit' => 1, 'delete' => 1, 'created_at' => NULL, 'updated_at' => NULL],
            // [32, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL],
            // [33, 1, 4, 1, 1, 1, 1, NULL, NULL, NULL],
            // [34, 1, 5, 1, 1, 1, 1, NULL, NULL, NULL],
            // [35, 1, 7, 1, 1, 1, 1, NULL, NULL, NULL],
            // [36, 1, 10, 1, 1, 1, 1, NULL, NULL, NULL],
            // [37, 1, 11, 1, 1, 1, 1, NULL, NULL, NULL],
            // [38, 1, 14, 1, 1, 1, 1, NULL, NULL, NULL],
            // [39, 1, 16, 1, NULL, 1, 1, NULL, NULL, NULL],
            [40, 1, 18, 1, 1, 1, 1, NULL, NULL, NULL],
            [41, 1, 19, 1, 1, 1, 1, NULL, NULL, NULL],
            // [41, 1, 18, 1, 1, 1, 1, NULL, NULL, NULL],
            // [42, 1, 22, 1, NULL, NULL, NULL, NULL, NULL, NULL],
            [43, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL],
            // [44, 1, 26, 1, 1, 1, 1, NULL, NULL, NULL],
            // [45, 1, 27, 1, 1, 1, 1, NULL, NULL, NULL],
            [46, 63, 1, 1, 0, NULL, NULL, NULL, NULL, NULL],
            // [47, 63, 26, 1, NULL, NULL, NULL, NULL, NULL, NULL],
            // [48, 1, 28, 1, NULL, NULL, NULL, NULL, NULL, NULL],
            // [49, 1, 29, 1, NULL, NULL, NULL, NULL, NULL, NULL],
            // [50, 1, 30, 1, NULL, NULL, NULL, NULL, NULL, NULL],
            // [51, 1, 33, 1, 1, 1, 1, NULL, NULL, NULL],
            // [52, 1, 34, 1, 1, 1, 1, NULL, NULL, NULL],
            // [53, 1, 35, 1, NULL, NULL, NULL, NULL, NULL, NULL],
            [54, 65, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL],
            // [55, 65, 5, 1, 1, 1, 1, NULL, NULL, NULL],
            // [56, 65, 27, 1, 1, 1, 1, NULL, NULL, NULL],
            // [57, 65, 7, 1, 1, 1, 1, NULL, NULL, NULL],
            // [58, 65, 10, 1, 1, 1, 1, NULL, NULL, NULL],
            // [59, 65, 11, 1, 1, 1, 1, NULL, NULL, NULL],
            // [60, 65, 14, 1, NULL, 1, 1, NULL, NULL, NULL],
            // [61, 65, 35, 1, 1, 1, 1, NULL, NULL, NULL],
            // [62, 1, 36, 1, NULL, NULL, NULL, NULL, NULL, NULL]
        ];
        $permissions_array = [];
        foreach ($data as $key => $value) {
            $permissions_array[] = [
                'id' => $value[0],
                'r_id' => $value[1],
                'm_id' => $value[2],
                'view' => $value[3],
                'add' => $value[4],
                'edit' => $value[5],
                'delete' => $value[6],
                'created_at' => $value[7],
                'updated_at' => $value[8]];
        }
        Permission::insert($permissions_array);
    }
}

