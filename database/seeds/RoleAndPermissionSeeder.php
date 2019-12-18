<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        //create permissions
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);

        Permission::create(['name' => 'create reviews']);
        Permission::create(['name' => 'edit reviews']);
        Permission::create(['name' => 'delete reviews']);

        //create roles and assign created permission
        $role = Role::create(['name' => 'customer']);
        $role->givePermissionTo('create reviews');

        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo('create products', 'edit products');
        $role->givePermissionTo('create reviews', 'edit reviews');

        $role = Role::create(['name' => 'owner']);
        $role->givePermissionTo(Permission::all());
    }
}
