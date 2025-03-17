<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   

        // Insert roles
        DB::table('roles')->insert([
            ['role_name' => 'admin'],
            ['role_name' => 'user'],
            ['role_name' => 'Manager'],
        ]);

        // Insert positions
        DB::table('positions')->insert([
            ['position_name' => 'CEO'],
            ['position_name' => 'Front-end Dev'],
            ['position_name' => 'Back-end Dev'],
            ['position_name' => 'WordPress Dev'],
            ['position_name' => 'Accountant'],
            ['position_name' => 'Senior Developer'],
        ]);

        // Insert employees
        DB::table('employees')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '1234567890',
                'date_of_entry' => '2024-01-15',
                'position_id' => 1,
                'role_id' => 1,
                'bank_name' => 'Bank ABC',
                'account_number' => '123456789',
                'account_holder' => 'John Doe',
                'avatar' => 'john_avatar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '0987654321',
                'date_of_entry' => '2024-02-01',
                'position_id' => 2,
                'role_id' => 2,
                'bank_name' => 'Bank XYZ',
                'account_number' => '987654321',
                'account_holder' => 'Jane Smith',
                'avatar' => 'jane_avatar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert users (linked to employees)
        DB::table('users')->insert([
            [
                'employee_id' => 1,
                'username' => 'sam',
                'role_id' => 1,
                'password' => Hash::make('123'), // Corrected column name to 'password'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 2,
                'username' => 'jone',
                'role_id' => 2,
                'password' => Hash::make('123'), // Corrected column name to 'password'
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}