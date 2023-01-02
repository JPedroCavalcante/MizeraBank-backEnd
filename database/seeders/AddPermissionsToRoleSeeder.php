<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPermissionsToRoleSeeder extends Seeder
{
    public function run()
    {
        $permisisons = [
            1, 2, 3, 4,
            5, 6, 7, 8,
            9, 10, 11, 12,
            13, 14, 15, 16,
            17, 18, 19, 20, 21,
        ];

        foreach ($permisisons as $permisison) {
            DB::table('permission_role')->insert([
                [
                    'permission_id' => $permisison,
                    'role_id' => 1,
                ],
            ]);
        }
    }
}
