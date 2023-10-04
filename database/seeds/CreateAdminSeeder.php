<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(["name" => "admin"]);

        $user = User::create([
            "name" => "Truely Asia",
            "email" => "care@ultrabyteit.com",
            "password" => bcrypt("Ultrabyte@12345"),
        ]);

        $permissions = Permission::pluck("id","id")->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        Role::create(["name" => "editor"]);
    }
}
