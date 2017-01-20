<?php
namespace Zix\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Zix\Core\Entities\Permission;
use Zix\Core\Entities\Role;

class PermissionsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
//        $role = Role::find(1);
        Permission::create(['name' => 'full_access', 'type' => 'admin']);
        Permission::create(['name' => 'view_admin', 'type' => 'admin']);

        $role->givePermissionTo('full_access');
        $role->givePermissionTo('view_admin');

        $models = ['settings', 'users', 'pages', 'forms'];
        $permissions = ['view', 'create', 'update', 'delete', 'restore'];

        foreach($models as $model) {
            foreach($permissions as $permission) {
                $access = Permission::create(['name' => $permission.'_'.$model, 'type' => $model]);
                $role->givePermissionTo($access->name);
            }
        }

    }
}
