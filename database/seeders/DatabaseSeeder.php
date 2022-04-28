<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $this->userSeeder();

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'Read']);
        Permission::create(['name' => 'Write']);
        Permission::create(['name' => 'Delete']);

        $role1 = Role::create(['name' => 'Super Admin']);
        $role1->givePermissionTo('Read');
        $role1->givePermissionTo('Write');
        $role1->givePermissionTo('Delete');

        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo('Read');

        $role3 = Role::create(['name' => 'Employee']);
        $role3->givePermissionTo('Read');

        $role4 = Role::create(['name' => 'HR Admin']);
        $role4->givePermissionTo('Read');
        $role4->givePermissionTo('Write');
        $role4->givePermissionTo('Delete');


        $faker = \Faker\Factory::create();

        $userFile = Storage::disk('public')->get("seed/user.json");

        $_user = json_decode($userFile);
        foreach ($_user as $key => $value) {
            $user = User::create([
                "firstname" => $value->firstname,
                "lastname" => $value->lastname,
                "email" => $value->email,
                // "roles" => $value->roles,
                "created_at" => $value->created_at,
                "role_type" => $value->role_type,
                "password" => Hash::make($faker->password(8, 15)),
                "mobile" => $faker->phoneNumber(),
                "username" => $faker->userName(),
            ]);

            if ($value->role_type == "CEO and Founder") {
                $user->assignRole($role1);
            } else if ($value->role_type == "Team Lead") {
                $user->assignRole($role2);
            } else if ($value->role_type == "HR") {
                $user->assignRole($role4);
            } else {
                $user->assignRole($role3);
            }
        }
    }

    // public function userSeeder()
    // {
    //     $faker = \Faker\Factory::create();

    //     $userFile = Storage::disk('public')->get("seed/user.json");

    //     $user = json_decode($userFile);
    //     foreach ($user as $key => $value) {
    //         User::create([
    //             "firstname" => $value->firstname,
    //             "lastname" => $value->lastname,
    //             "email" => $value->email,
    //             // "roles" => $value->roles,
    //             "created_at" => $value->created_at,
    //             "role_type" => $value->role_type,
    //             "password" => Hash::make($faker->password(8, 15)),
    //             "mobile" => $faker->phoneNumber(),
    //             "username" => $faker->userName(),
    //         ]);
    //     }
    // }

    // public function PermissionSeeder()
    // {
    //     app()[PermissionRegistrar::class]->forgetCachedPermissions();

    //     Permission::create(['name' => 'Read']);
    //     Permission::create(['name' => 'Write']);
    //     Permission::create(['name' => 'Delete']);

    //     $role1 = Role::create(['name' => 'Super Admin']);
    //     $role1->givePermissionTo('Read');
    //     $role1->givePermissionTo('Write');
    //     $role1->givePermissionTo('Delete');

    //     $role2 = Role::create(['name' => 'Admin']);
    //     $role2->givePermissionTo('Read');

    //     $role3 = Role::create(['name' => 'Employee']);
    //     $role3->givePermissionTo('Read');

    //     $role4 = Role::create(['name' => 'HR Admin']);
    //     $role4->givePermissionTo('Read');
    //     $role4->givePermissionTo('Write');
    //     $role4->givePermissionTo('Delete');
    // }
}
