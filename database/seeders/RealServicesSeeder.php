<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class RealServicesSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'id' => 1,
                'name' => 'messages.service_general',
                'description' => 'Examen médical général de routine',
                'duration' => 30,
            ],
            [
                'id' => 2,
                'name' => 'messages.service_cardiology',
                'description' => 'Consultation avec un cardiologue',
                'duration' => 45,
            ],
            [
                'id' => 3,
                'name' => 'messages.service_pediatric',
                'description' => 'Soins et consultations pour enfants',
                'duration' => 30,
            ],
            [
                'id' => 4,
                'name' => 'messages.service_dermatology',
                'description' => 'Examen de la peau et traitements',
                'duration' => 30,
            ],
            [
                'id' => 5,
                'name' => 'messages.service_blood_test',
                'description' => 'Prise de sang et analyses de laboratoire',
                'duration' => 15,
            ],
            [
                'id' => 6,
                'name' => 'messages.service_radiology',
                'description' => 'Échographie, radiographie et imagerie médicale',
                'duration' => 45,
            ]
        ];

        foreach ($services as $service) {
            $existing = Service::find($service['id']);
            if ($existing) {
                $existing->update($service);
            } else {
                Service::create($service);
            }
        }
    }
}
