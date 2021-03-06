<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class userSeeder extends Seeder
{
    public function run()
    {

        $permissions = ['roles_access', 'roles_manage', 'roles'];

        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }

        $role = Role::create(['name'=>'admin']);
        $role->givePermissionTo($permissions);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        $user->assignRole('admin');

    }
}
