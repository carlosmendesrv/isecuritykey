<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'role-create', 'model' => 'role', 'description' => 'Criar grupo de permissões']);
        Permission::create(['name' => 'role-delete', 'model' => 'role', 'description' => 'Apagar um grupo de permissões']);
        Permission::create(['name' => 'role-list' , 'model' => 'role', 'description' => 'Listar grupos de permissões']);
        Permission::create(['name' => 'role-assign-permission', 'model' => 'role', 'description' => 'Adicionar permissão a um grupo']);
        Permission::create(['name' => 'role-revoke-permission', 'model' => 'role', 'description' => 'Remover permission de uma grupo']);

        Permission::create(['name' => 'user-create', 'model' => 'user', 'description' => 'Criar e Listar usuários no sistema']);
        Permission::create(['name' => 'user-delete', 'model' => 'user', 'description' => 'Apagar usuários no sistema']);

        Permission::create(['name' => 'group-create', 'model' => 'group',  'description' => 'Criar e Listar grupo de senhas']);
        Permission::create(['name' => 'group-delete', 'model' => 'group', 'description' => 'Deletar grupo de senhas']);

        Permission::create(['name' => 'category-create', 'model' => 'permission', 'description' => 'Criar e Listar categoria para grupos']);
        Permission::create(['name' => 'category-delete', 'model' => 'permission', 'description' => 'Deletar categoria dos grupos']);
    }
}
