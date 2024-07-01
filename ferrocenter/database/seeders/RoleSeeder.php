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

            'view.purchasesdetails',
            'create.purchasesdetails',
            'edit.purchasesdetails',
            'delete.purchasesdetails',

            'view.salesdetails',
            'create.salesdetails',
            'edit.salesdetails',
            'delete.salesdetails',

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
        $admin = Role::create(['name' => 'admin',
        'description' => 'Encargado de administrar todo']);
        $admin->givePermissionTo(Permission::all());

        $vendedor = Role::create(['name' => 'vendedor',
        'description' => 'Encargado de ventas']);
        $vendedor->givePermissionTo([
            'view.products',
            'view.clients',

            'create.transactions',
            'edit.transactions',
            'view.transactions',
            'delete.transactions',

            'view.salesdetails',
            'create.salesdetails',
            'edit.salesdetails',
            'delete.salesdetails',
            
        ]);

        $gerente = Role::create(['name' => 'gerente',
        'description' => 'Encargado de ventas, compras, empleados']);
        $gerente->givePermissionTo([
            'view.products',
            'view.categories',
            'view.clients',
            'view.purchases',
            
            'view.salesdetails',
            'create.salesdetails',
            'edit.salesdetails',
            'delete.salesdetails',

            'view.inventory',
            'view.modules',
            'view.employees',
            'view.suppliers',

            'create.transactions',
            'edit.transactions',
            'view.transactions',
            'delete.transactions'
        ]);

        $compras = Role::create(['name' => 'compras',
        'description' => 'Encargado de compras']);
        $compras->givePermissionTo([
            'view.products',
            'view.purchases',
            'create.purchases',
            'edit.purchases',
            'view.suppliers'
        ]);

        $inventario = Role::create(['name' => 'inventario',
        'description' => 'Encargado del inventario']);
        $inventario->givePermissionTo([
            'view.inventory',
            'view.products',
            'manage.inventory',
            'view.purchases',
            'view.salesdetails'
        ]);

        $cliente = Role::create(['name' => 'cliente',
        'description' => 'Cliente de la ferreteria']);
        $cliente->givePermissionTo([
            'view.products'
        ]);
    }
}
