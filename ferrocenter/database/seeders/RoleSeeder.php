<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Elimina roles y permisos existentes para evitar duplicados
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        $permissions = [
            'view.products',
            'create.products',
            'edit.products',
            'delete.products',

            'view.categories',
            'create.categories',
            'edit.categories',
            'delete.categories',

            'view.clients',
            'create.clients',
            'edit.clients',
            'delete.clients',

            'view.purchases',
            'create.purchases',
            'edit.purchases',
            'delete.purchases',

            'view.sales',
            'create.sales',
            'edit.sales',
            'delete.sales',

            'view.inventory',
            'manage.inventory',

            'view.modules',
            'manage.modules',

            'view.employees',
            'create.employees',
            'edit.employees',
            'delete.employees',

            'view.suppliers',
            'create.suppliers',
            'edit.suppliers',
            'delete.suppliers',

            'view.transactions',
            'create.transactions',
            'edit.transactions',
            'delete.transactions',

            'view.users',
            'create.users',
            'edit.users',
            'delete.users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Crear roles y asignar permisos
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $vendedor = Role::create(['name' => 'vendedor']);
        $vendedor->givePermissionTo([
            'view.products',
            'view.clients',
            'create.sales',
            'edit.sales',
            'view.sales'
        ]);

        $gerente = Role::create(['name' => 'gerente']);
        $gerente->givePermissionTo([
            'view.products',
            'view.categories',
            'view.clients',
            'view.purchases',
            'view.sales',
            'view.inventory',
            'view.modules',
            'view.employees',
            'view.suppliers',
            'view.transactions'
        ]);

        $compras = Role::create(['name' => 'compras']);
        $compras->givePermissionTo([
            'view.products',
            'view.purchases',
            'create.purchases',
            'edit.purchases',
            'view.suppliers'
        ]);

        $inventario = Role::create(['name' => 'inventario']);
        $inventario->givePermissionTo([
            'view.products',
            'manage.inventory',
            'view.purchases',
            'view.sales'
        ]);

        $cliente = Role::create(['name' => 'cliente']);
        $cliente->givePermissionTo([
            'view.products'
        ]);
    }
}
