<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Role::firstOrCreate(['name' => 'user']);


        Role::firstOrCreate(['name' => 'admin']);
        $user = User::create([
            'f_name' => 'super',
            'l_name' => 'admin',
            'phone' => '09990', 'email' => 'admin@aa.net',
           // 'user_type' => Role::where('name', 'admin')->first(),
            'password' => bcrypt('123456789')

        ]);
        $user->assignRole('admin');
    }
}
