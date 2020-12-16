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
        Permission::create(['name' => 'role-create', 'model' => 'role', 'description' => 'Criar grupo de usuários']);
        Permission::create(['name' => 'role-delete', 'model' => 'role', 'description' => 'Apagar um grupo de usuários']);
        Permission::create(['name' => 'role-list' , 'model' => 'role', 'description' => 'Listar grupos de usuários']);
        Permission::create(['name' => 'role-assign-permission', 'model' => 'role', 'description' => 'Adicionar permissão a um grupo']);
        Permission::create(['name' => 'role-revoke-permission', 'model' => 'role', 'description' => 'Remover permission de uma grupo']);

        Permission::create(['name' => 'user-create', 'model' => 'user', 'description' => 'Criar usuários no sistema']);
        Permission::create(['name' => 'user-delete', 'model' => 'user', 'description' => 'Apagar usuários no sistema']);
        Permission::create(['name' => 'user-list' , 'model' => 'user', 'description' => 'Deleta usuários no sistema']);

        Permission::create(['name' => 'group-create', 'model' => 'group',  'description' => 'Criar grupo no sistema']);
        Permission::create(['name' => 'group-delete', 'model' => 'group', 'description' => 'Apagar grupo no sistema']);
        Permission::create(['name' => 'group-list' , 'model' => 'group', 'description' => 'Deleta grupo no sistema']);

        Permission::create(['name' => 'category-create', 'model' => 'permission', 'description' => 'Criar categoria no sistema']);
        Permission::create(['name' => 'category-delete', 'model' => 'permission', 'description' => 'Apagar categoria no sistema']);
        Permission::create(['name' => 'category-list' , 'model' => 'permission', 'description' => 'Deleta categoria no sistema']);
    }
}
