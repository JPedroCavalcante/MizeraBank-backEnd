<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'pedro',
                'email' => 'pedro@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 1,
            ],
            [
                'name' => 'joao',
                'email' => 'joao@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 2,
            ]
        ]);
    }
}
