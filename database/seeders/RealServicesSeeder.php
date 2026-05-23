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
                'name' => 'messages.service_consultation',
                'description' => 'Examen dentaire complet de routine',
                'duration' => 30,
            ],
            [
                'id' => 2,
                'name' => 'messages.service_scaling',
                'description' => 'Nettoyage en profondeur des dents',
                'duration' => 45,
            ],
            [
                'id' => 3,
                'name' => 'messages.service_extraction',
                'description' => 'Extraction de dent endommagée ou de sagesse',
                'duration' => 60,
            ],
            [
                'id' => 4,
                'name' => 'messages.service_whitening',
                'description' => 'Traitement esthétique de blanchiment professionnel',
                'duration' => 90,
            ],
            [
                'id' => 5,
                'name' => 'messages.service_implant',
                'description' => 'Chirurgie pour la pose d\'un implant dentaire',
                'duration' => 120,
            ],
            [
                'id' => 6,
                'name' => 'messages.service_root_canal',
                'description' => 'Traitement endodontique pour sauver une dent infectée',
                'duration' => 90,
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
