<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Role::create(['name' => 'patient']);
         Role::create(['name' => 'staff']);

        $user = User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'nric' => '9754238482',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('staff');
    }
}
