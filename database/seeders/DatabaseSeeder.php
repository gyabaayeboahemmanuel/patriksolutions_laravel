<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@patriksolutions.com',
            'role' => 'admin',
            'password' => Hash::make('dev@patriksolutions'),

            'name' => 'user',
            'email' => 'user@user',
        ]);
        // User::factory()->create([
        //     'name' => 'user',
        //     'email' => 'user@user',
        // ]);
    }
}
