<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create the Admin User
        User::factory()->create([
            'name' => 'Admin Clinic',
            'email' => 'admin@clinic.ma',
            'role' => 'doctor',
        ]);

        // 2. Create Moroccan Doctors
        $doctors = [
            'Dr. Amine Benali' => 'amine@clinic.ma',
            'Dr. Yassine El Fassi' => 'yassine@clinic.ma',
            'Dr. Fatima Zahra' => 'fatima@clinic.ma',
        ];

        foreach ($doctors as $name => $email) {
            User::factory()->create([
                'name' => $name,
                'email' => $email,
                'role' => 'doctor',
            ]);
        }

        // 3. Create Moroccan Patients
        $patients = [
            'Hassan Oufkir' => 'hassan@gmail.com',
            'Khadija El Mansouri' => 'khadija@gmail.com',
            'Mehdi Tazi' => 'mehdi@gmail.com',
            'Salma Bennani' => 'salma@gmail.com',
            'Ayoub Chraibi' => 'ayoub@gmail.com',
        ];

        foreach ($patients as $name => $email) {
            User::factory()->create([
                'name' => $name,
                'email' => $email,
                'role' => 'patient',
            ]);
        }

        // 4. Seed Real Services
        $this->call([
            RealServicesSeeder::class,
        ]);
        
        // Note: No appointments generated yet to keep it clean, but ready for Moroccan data!
    }
}
