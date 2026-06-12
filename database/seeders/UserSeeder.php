<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'ADMIN')->first();
        
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@sams.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,

        ]);
    }
}
