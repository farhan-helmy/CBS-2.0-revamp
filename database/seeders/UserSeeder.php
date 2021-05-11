<?php

namespace Database\Seeders;

use App\Models\Panel;
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
        Role::create(['name' => 'doctor']);
        Panel::create([
            'company_name' => 'Non',
            'company_details' => 'Non',

        ]);

        $user = User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'nric' => '9754238482',
            'password' => Hash::make('password'),
            'status' => 'staff',
            'panel_id' => 1
        ]);

        $doctor = User::create([
            'name' => 'doctor',
            'email' => 'doctor@gmail.com',
            'nric' => '1234',
            'password' => Hash::make('password'),
            'status' => 'doctor',
            'panel_id' => 1
        ]);

      

        $user->assignRole('staff');
        $doctor->assignRole('doctor');
    }
}
