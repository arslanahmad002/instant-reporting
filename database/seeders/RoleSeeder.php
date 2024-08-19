<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(Role::all()) >0) return;
        $roles = array(
            array('id' => '1','name' => 'Admin','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '63','name' => 'operations','status' => '0','created_at' => NULL,'updated_at' => '2023-03-07 16:41:46','deleted_at' => NULL),
            array('id' => '64','name' => 'Accounts','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL),
            array('id' => '65','name' => 'Manager','status' => '1','created_at' => NULL,'updated_at' => NULL,'deleted_at' => NULL)
        );
        Role::insert($roles);
    }
}
