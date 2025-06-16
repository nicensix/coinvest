<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure roles exist
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '1234567890',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        // Create Regular User
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'phone' => '0987654321',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');
    }
}