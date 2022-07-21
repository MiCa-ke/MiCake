<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'cliente']);
        $role3 = Role::create(['name' => 'empleado']);

        Permission::create(['name' => 'admin.index'])->syncRoles($role1);
        Permission::create(['name' => 'admin.create'])->syncRoles($role1);
        Permission::create(['name' => 'admin.update'])->syncRoles($role1);
        Permission::create(['name' => 'admin.delete'])->syncRoles($role1);

        Permission::create(['name' => 'usuario.index'])->syncRoles($role1);
        Permission::create(['name' => 'usuario.create'])->syncRoles($role1);
        Permission::create(['name' => 'usuario.update'])->syncRoles($role1);
        Permission::create(['name' => 'usuario.delete'])->syncRoles($role1);

        Permission::create(['name' => 'cliente.index'])->syncRoles($role2);
        Permission::create(['name' => 'cliente.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'cliente.update'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'cliente.delete'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'empleado.index'])->syncRoles($role3);
        Permission::create(['name' => 'empleado.create'])->syncRoles($role1);
        Permission::create(['name' => 'empleado.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'empleado.delete'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'producto.index'])->syncRoles($role1);
        Permission::create(['name' => 'producto.create'])->syncRoles($role1);
        Permission::create(['name' => 'producto.update'])->syncRoles($role1);
        Permission::create(['name' => 'producto.delete'])->syncRoles($role1);

        Permission::create(['name' => 'receta.index'])->syncRoles($role1);
        Permission::create(['name' => 'receta.create'])->syncRoles($role1);
        Permission::create(['name' => 'receta.update'])->syncRoles($role1);
        Permission::create(['name' => 'receta.delete'])->syncRoles($role1);

        Permission::create(['name' => 'medida.index'])->syncRoles($role1);
        Permission::create(['name' => 'medida.create'])->syncRoles($role1);
        Permission::create(['name' => 'medida.update'])->syncRoles($role1);
        Permission::create(['name' => 'medida.delete'])->syncRoles($role1);

        Permission::create(['name' => 'ingrediente.index'])->syncRoles($role1);
        Permission::create(['name' => 'ingrediente.create'])->syncRoles($role1);
        Permission::create(['name' => 'ingrediente.update'])->syncRoles($role1);
        Permission::create(['name' => 'ingrediente.delete'])->syncRoles($role1);

        Permission::create(['name' => 'pedido.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'pedido.create'])->syncRoles($role2);
        Permission::create(['name' => 'pedido.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'pedido.delete'])->syncRoles([$role1, $role2, $role3]);
    }
}
