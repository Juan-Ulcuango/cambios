<?php

namespace Database\Seeders;

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

        // Crear permisos individualmente
        Permission::create(['name' => 'view.products', 'description' => 'Ver productos']);
        Permission::create(['name' => 'create.products', 'description' => 'Crear productos']);
        Permission::create(['name' => 'edit.products', 'description' => 'Editar productos']);
        Permission::create(['name' => 'delete.products', 'description' => 'Eliminar productos']);

        Permission::create(['name' => 'view.categories', 'description' => 'Ver categorías']);
        Permission::create(['name' => 'create.categories', 'description' => 'Crear categorías']);
        Permission::create(['name' => 'edit.categories', 'description' => 'Editar categorías']);
        Permission::create(['name' => 'delete.categories', 'description' => 'Eliminar categorías']);

        Permission::create(['name' => 'view.clients', 'description' => 'Ver clientes']);
        Permission::create(['name' => 'create.clients', 'description' => 'Crear clientes']);
        Permission::create(['name' => 'edit.clients', 'description' => 'Editar clientes']);
        Permission::create(['name' => 'delete.clients', 'description' => 'Eliminar clientes']);

        Permission::create(['name' => 'view.purchases', 'description' => 'Ver compras']);
        Permission::create(['name' => 'create.purchases', 'description' => 'Crear compras']);
        Permission::create(['name' => 'edit.purchases', 'description' => 'Editar compras']);
        Permission::create(['name' => 'delete.purchases', 'description' => 'Eliminar compras']);

        Permission::create(['name' => 'view.purchasesdetails', 'description' => 'Ver detalles de compras']);
        Permission::create(['name' => 'create.purchasesdetails', 'description' => 'Crear detalles de compras']);
        Permission::create(['name' => 'edit.purchasesdetails', 'description' => 'Editar detalles de compras']);
        Permission::create(['name' => 'delete.purchasesdetails', 'description' => 'Eliminar detalles de compras']);

        Permission::create(['name' => 'view.salesdetails', 'description' => 'Ver detalles de ventas']);
        Permission::create(['name' => 'create.salesdetails', 'description' => 'Crear detalles de ventas']);
        Permission::create(['name' => 'edit.salesdetails', 'description' => 'Editar detalles de ventas']);
        Permission::create(['name' => 'delete.salesdetails', 'description' => 'Eliminar detalles de ventas']);

        Permission::create(['name' => 'view.inventory', 'description' => 'Ver inventario']);
        Permission::create(['name' => 'manage.inventory', 'description' => 'Gestionar inventario']);

        Permission::create(['name' => 'view.modules', 'description' => 'Ver módulos']);
        Permission::create(['name' => 'manage.modules', 'description' => 'Gestionar módulos']);

        Permission::create(['name' => 'view.employees', 'description' => 'Ver empleados']);
        Permission::create(['name' => 'create.employees', 'description' => 'Crear empleados']);
        Permission::create(['name' => 'edit.employees', 'description' => 'Editar empleados']);
        Permission::create(['name' => 'delete.employees', 'description' => 'Eliminar empleados']);

        Permission::create(['name' => 'view.suppliers', 'description' => 'Ver proveedores']);
        Permission::create(['name' => 'create.suppliers', 'description' => 'Crear proveedores']);
        Permission::create(['name' => 'edit.suppliers', 'description' => 'Editar proveedores']);
        Permission::create(['name' => 'delete.suppliers', 'description' => 'Eliminar proveedores']);

        Permission::create(['name' => 'view.transactions', 'description' => 'Ver transacciones']);
        Permission::create(['name' => 'create.transactions', 'description' => 'Crear transacciones']);
        Permission::create(['name' => 'edit.transactions', 'description' => 'Editar transacciones']);
        Permission::create(['name' => 'delete.transactions', 'description' => 'Eliminar transacciones']);

        Permission::create(['name' => 'view.users', 'description' => 'Ver usuarios']);
        Permission::create(['name' => 'create.users', 'description' => 'Crear usuarios']);
        Permission::create(['name' => 'edit.users', 'description' => 'Editar usuarios']);
        Permission::create(['name' => 'delete.users', 'description' => 'Eliminar usuarios']);

        // Crear roles y asignar permisos
        $admin = Role::create(['name' => 'admin', 'description' => 'Encargado de administrar todo']);
        $admin->givePermissionTo(Permission::all());

        $vendedor = Role::create(['name' => 'vendedor', 'description' => 'Encargado de ventas']);
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

        $gerente = Role::create(['name' => 'gerente', 'description' => 'Encargado de ventas, compras, empleados']);
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
            'delete.transactions',
        ]);

        $compras = Role::create(['name' => 'compras', 'description' => 'Encargado de compras']);
        $compras->givePermissionTo([
            'view.products',
            'view.purchases',
            'create.purchases',
            'edit.purchases',
            'view.suppliers',
        ]);

        $inventario = Role::create(['name' => 'inventario', 'description' => 'Encargado del inventario']);
        $inventario->givePermissionTo([
            'view.inventory',
            'view.products',
            'manage.inventory',
            'view.purchases',
            'view.salesdetails',
        ]);

        $cliente = Role::create(['name' => 'cliente', 'description' => 'Cliente de la ferretería']);
        $cliente->givePermissionTo(['view.products']);
    }
}
