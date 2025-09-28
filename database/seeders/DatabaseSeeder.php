<?php


namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run()
        {
            // Admin
            User::updateOrCreate(
                ['email' => 'admin@gmail.com'],
                [
                    'name' => 'Super Admin',
                    'password' => Hash::make('admin123'),
                    'role' => 'admin',
                ]
            );

            // Guru
            User::updateOrCreate(
                ['email' => 'guru@gmail.com'],
                [
                    'name' => 'Budi Guru',
                    'password' => Hash::make('guru123'),
                    'role' => 'guru',
                ]
            );
        }
}


