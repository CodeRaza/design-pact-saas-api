<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_list = Permission::create(['name'=>'users.list']);
        $user_view = Permission::create(['name'=>'users.view']);
        $user_create = Permission::create(['name'=>'users.create']);
        $user_update = Permission::create(['name'=>'users.update']);
        $user_delete = Permission::create(['name'=>'users.delete']);

        $sneakers_list = Permission::create(['name'=>'sneakers.list']);

        $admin_role = Role::create(['name' => 'admin']);
        $store_manager_role = Role::create(['name' => 'store_manager']);

        $store_manager_role->givePermissionTo([
            $sneakers_list
        ]);

        $admin_role->givePermissionTo([
            $user_create,
            $user_list,
            $user_update,
            $user_view,
            $user_delete
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123')
        ]);

        $admin->assignRole($admin_role);
        $admin->givePermissionTo([
            $user_create,
            $user_list,
            $user_update,
            $user_view,
            $user_delete
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('123')
        ]);

        $user_role = Role::create(['name' => 'user']);

        $user->assignRole($user_role);
        $user->givePermissionTo([
            $user_list,
        ]);

        $user_role->givePermissionTo([
            $user_list,
        ]);
    }
}
