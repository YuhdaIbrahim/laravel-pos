<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(8)->create()->each(function ($role){
            $user = User::factory(1)->make();
            $role->users()->saveMany($user);
        });
    }
}
