<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 2 doctors
        User::factory(2)->create(['role' => 'doctor']);
        // Create 8 patients
        User::factory(8)->create(['role' => 'patient']);
        // Create 3 services
        \App\Models\Service::factory(3)->create();
        // Create 20 appointments
        \App\Models\Appointment::factory(20)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'doctor',
        ]);
    }
}
