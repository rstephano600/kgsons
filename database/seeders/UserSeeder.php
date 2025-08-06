<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Nuru S. Robert',
                'email' => 'robert@kgsons.co.tz',
                'password' => Hash::make('kgsuper2468=admin'),
                'role' => 'admin',
                'phone' => '0657856790',
                'status' => 'active',
            ],
            [
                'name' => 'Gabriel Bijanju',
                'email' => 'gabriel@kgsons.co.tz',
                'password' => Hash::make('12344321'),
                'role' => 'director',
                'phone' => '0711111111',
                'status' => 'active',
            ],
            [
                'name' => 'Assistant Director',
                'email' => 'assistant@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'assistantdirector',
                'phone' => '0722222222',
                'status' => 'active',
            ],
            [
                'name' => 'Operations Manager',
                'email' => 'manager@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'manager',
                'phone' => '0733333333',
                'status' => 'active',
            ],
            [
                'name' => 'Company Secretary',
                'email' => 'secretary@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'secretary',
                'phone' => '0744444444',
                'status' => 'active',
            ],
            [
                'name' => 'Staff 1 Member',
                'email' => 'staff@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'staff',
                'phone' => '0755555555',
                'status' => 'active',
            ],
            [
                'name' => 'Staff 2 Member',
                'email' => 'staff2@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'staff',
                'phone' => '0755555555',
                'status' => 'active',
            ],
            [
                'name' => 'Staff 3 Member',
                'email' => 'staff3@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'staff',
                'phone' => '0755555555',
                'status' => 'innactive',
            ],
            [
                'name' => 'Customer 1 Example ',
                'email' => 'customer@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'customer',
                'phone' => '0766666666',
                'status' => 'active',
            ],
            [
                'name' => 'Customer 2 Example',
                'email' => 'customer2@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'customer',
                'phone' => '0766666666',
                'status' => 'active',
            ],
            [
                'name' => 'Customer 3 Example',
                'email' => 'customer3@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'customer',
                'phone' => '0766666666',
                'status' => 'innactive',
            ],
            [
                'name' => 'Generic User',
                'email' => 'user@example.com',
                'password' => Hash::make('12344321'),
                'role' => 'user',
                'phone' => '0777777777',
                'status' => 'active',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
