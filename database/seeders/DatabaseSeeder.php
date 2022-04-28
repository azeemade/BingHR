<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

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

        $this->userSeeder();
    }

    public function userSeeder()
    {
        $faker = \Faker\Factory::create();

        $userFile = Storage::disk('public')->get("seed/user.json");

        $user = json_decode($userFile);
        foreach ($user as $key => $value) {
            User::create([
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
        }
    }
}
