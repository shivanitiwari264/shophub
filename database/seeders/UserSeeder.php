<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Main test user
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('123456')
            ]
        );

        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('admin123')
            ]
        );

        // Generate 5 random users
        for ($i = 1; $i <= 5; $i++) {
            User::updateOrCreate(
                ['email' => 'user'.$i.'@example.com'],
                [
                    'name' => 'User '.$i,
                    'password' => bcrypt('password'.$i)
                ]
            );
        }

        $this->command->info('Users seeded successfully!');
    }
}
