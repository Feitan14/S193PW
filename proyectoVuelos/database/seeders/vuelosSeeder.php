<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vuelos;

class vuelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $aerolineas = ['Aeroméxico', 'Volaris', 'Interjet', 'Viva Aerobus'];

        for ($i = 0; $i < 50; $i++) {
            Vuelos::create([
                'numero_vuelo' => strtoupper($faker->bothify('??###')),
                'aerolinea' => $faker->randomElement($aerolineas),
                'hora_salida' => $faker->time(),
                'hora_llegada' => $faker->time(),
                'duracion' => $faker->numberBetween(60, 720), // En minutos
                'precio' => $faker->randomFloat(2, 50, 1000), // De 50 a 1000
                'tiene_escalas' => $faker->boolean(30), // 30% de probabilidad de que tenga escalas
                'asientos_disponibles' => $faker->numberBetween(0, 200),
            ]);
        }
    }
}
