<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::firstOrCreate(
            ['whatsapp' => '628111111111'],
            [
                'name' => 'Admin User',
                'username' => 'adminuser',
                'email' => 'admin@example.com',
                'password' => Hash::make('amanAdmin123'),
                'role' => 'admin',
                // removed email_verified_at to avoid seeding a non-existent column
            ]
        );

        // Affiliator User
        User::firstOrCreate(
            ['whatsapp' => '628222222222'],
            [
                'name' => 'Affiliator User',
                'username' => 'affiliatoruser',
                'email' => 'affiliator@example.com',
                'password' => Hash::make('amanAff123'),
                'role' => 'affiliator',
                // removed email_verified_at to avoid seeding a non-existent column
            ]
        );

        // Mitra User
        User::firstOrCreate(
            ['whatsapp' => '628333333333'],
            [
                'name' => 'Mitra User',
                'username' => 'mitrauser',
                'email' => 'mitra@example.com',
                'password' => Hash::make('amanMitra123'),
                'role' => 'mitra',
                // removed email_verified_at to avoid seeding a non-existent column
            ]
        );
    }
}
