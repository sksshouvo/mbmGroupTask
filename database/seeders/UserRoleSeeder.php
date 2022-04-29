<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allUser = User::all();
        $allRoles = Role::all();
        foreach ($allUser as $key => $data) {
            if ($allRoles[$key]['display_name'] == $data->name) {
                $data->attachRole($allRoles[$key]);
            }
        }
    }
}
