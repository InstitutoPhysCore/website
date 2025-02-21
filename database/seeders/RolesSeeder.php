<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Renovar banco de dados de permissões e cargos
        DB::table('permissions')->delete();
        DB::table('role_has_permissions')->delete();
        DB::table('roles')->delete();
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Pegar arquivo de permissões
        $roles = json_decode(Storage::get('permissions.json'));

        // Criar as permissões
        foreach($roles->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Criar os cargos e dar suas respectivas permissões especificadas
        foreach($roles->roles as $role) {
            $newRole = Role::create(['name' => $role->name]);
            $newRole->syncPermissions($role->permissions);
        }
    }
}