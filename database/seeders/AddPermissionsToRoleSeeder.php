<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPermissionsToRoleSeeder extends Seeder
{
    public function run()
    {
        foreach (Permission::all() as $permission){
            DB::table('permission_role')->insert([
                'permission_id' => $permission->id,
                'role_id' => 1,
            ]);
        }
    }
}
