<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        $admin_roles = Roles::where('name','admin')->first();
        $user_roles = Roles::where('name','user')->first();

        $admin = Admin::create([
           'name' =>'admin1',
           'email'=> 'admin1@gmail.com',
           'phone' => '0111111111',
           'password' => Hash::make('123456')
        ]);

        $user = Admin::create([
            'name' =>'user1',
            'email'=> 'user1@gmail.com',
            'phone' => '0111111111',
            'password' => Hash::make('123456')
        ]);

        $admin->roles()->attach($admin_roles);
        $user->roles()->attach($user_roles);

    }
}
