<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([

                // Permissões usuários
                [
                    'name' => 'index-users',
                    'description' => 'Listar usuários',
                ],
                [
                    'name' => 'store-user',
                    'description' => 'Criar usuários',
                ],
                [
                    'name' => 'update-user',
                    'description' => 'Atualizar usuário',
                ],
                [
                    'name' => 'delete-user',
                    'description' => 'Deletar usuário',
                ],

                // Permissões conta

                [
                    'name' => 'index-accounts',
                    'description' => 'Listar contas',
                ],
                [
                    'name' => 'store-account',
                    'description' => 'Criar conta',
                ],
                [
                    'name' => 'update-account',
                    'description' => 'Atualizar conta',
                ],
                [
                    'name' => 'delete-account',
                    'description' => 'Deletar conta',
                ],
                // Permissões agência
                [
                    'name' => 'index-agencies',
                    'description' => 'Listar agências',
                ],
                [
                    'name' => 'store-agency',
                    'description' => 'Criar agência',
                ],
                [
                    'name' => 'update-agency',
                    'description' => 'Atualizar agência',
                ],
                [
                    'name' => 'delete-agency',
                    'description' => 'Deletar usuário',
                ],

                // Permissões titular

                [
                    'name' => 'index-holders',
                    'description' => 'Listar usuários',
                ],
                [
                    'name' => 'store-holder',
                    'description' => 'Criar titular',
                ],
                [
                    'name' => 'update-holder',
                    'description' => 'Atualizar titular',
                ],
                [
                    'name' => 'delete-holder',
                    'description' => 'Deletar titular',
                ],

                // Permissões cargo

                [
                    'name' => 'set-permissions-for-role',
                    'description' => 'Setar permissões para um cargo',
                ],
                [
                    'name' => 'index-roles',
                    'description' => 'Listar cargos',
                ],
                [
                    'name' => 'store-role',
                    'description' => 'Criar cargos',
                ],
                [
                    'name' => 'update-role',
                    'description' => 'Atualizar cargo'
                ],
                [
                    'name' => 'delete-role',
                    'description' => 'Deletar cargo'
                ],
            ]
        );
    }
}
