<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => env('SEED_ADMIN_EMAIL', 'admin@karuna.id'),
        ], [
            'name' => 'Administrator',
            'password' => Hash::make(env('SEED_ADMIN_PASSWORD', 'KarunaAdmin2026!')),
        ]);
    }
}
