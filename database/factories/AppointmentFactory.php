<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => \App\Models\User::where('role', 'patient')->inRandomOrder()->first() ?? \App\Models\User::factory()->create(['role' => 'patient']),
            'doctor_id' => \App\Models\User::where('role', 'doctor')->inRandomOrder()->first() ?? \App\Models\User::factory()->create(['role' => 'doctor']),
            'service_id' => \App\Models\Service::inRandomOrder()->first() ?? \App\Models\Service::factory(),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled']),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
