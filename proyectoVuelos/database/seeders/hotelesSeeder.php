<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class hotelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hoteles = [
            [
                'destino' => 'New York',
                'fechas' => '2024-12-10 to 2024-12-15',
                'no_habitaciones' => 150,
                'no_huespedes' => 300,
                'nombre_hotel' => 'The Plaza Hotel',
                'calificacion' => 4.8,
                'no_estrellas' => 5,
                'precio_noche' => 450.00,
                'disponibilidad' => true,
                'descripcion' => 'Un hotel icónico ubicado en el corazón de Manhattan, perfecto para una experiencia de lujo.',
                'comentarios' => 'Excepcional servicio y excelente ubicación.',
            ],
            [
                'destino' => 'Paris',
                'fechas' => '2024-12-20 to 2024-12-25',
                'no_habitaciones' => 200,
                'no_huespedes' => 400,
                'nombre_hotel' => 'Hotel Le Meurice',
                'calificacion' => 4.7,
                'no_estrellas' => 5,
                'precio_noche' => 550.00,
                'disponibilidad' => true,
                'descripcion' => 'Un hotel clásico con vistas impresionantes a los jardines de las Tullerías.',
                'comentarios' => 'Ambiente elegante y un personal muy atento.',
            ],
            [
                'destino' => 'Tokyo',
                'fechas' => '2024-12-05 to 2024-12-10',
                'no_habitaciones' => 180,
                'no_huespedes' => 360,
                'nombre_hotel' => 'Park Hyatt Tokyo',
                'calificacion' => 4.9,
                'no_estrellas' => 5,
                'precio_noche' => 600.00,
                'disponibilidad' => true,
                'descripcion' => 'Famoso por sus vistas panorámicas de la ciudad y su ambiente sofisticado.',
                'comentarios' => 'Vistas impresionantes y habitaciones impecables.',
            ],
            // Continúa con más registros...
        ];

        for ($i = 4; $i <= 50; $i++) {
            $hoteles[] = [
                'destino' => ['Madrid', 'Berlin', 'London', 'Los Angeles', 'Dubai'][$i % 5],
                'fechas' => '2024-' . rand(1, 12) . '-' . rand(1, 28) . ' to 2024-' . rand(1, 12) . '-' . rand(1, 28),
                'no_habitaciones' => rand(50, 300),
                'no_huespedes' => rand(100, 600),
                'nombre_hotel' => 'Hotel ' . ['Royal', 'Elegance', 'Paradise', 'Haven', 'Sky'][$i % 5],
                'calificacion' => round(rand(35, 50) / 10, 1), // Entre 3.5 y 5.0
                'no_estrellas' => rand(3, 5),
                'precio_noche' => rand(80, 600) + rand(0, 99) / 100, // Entre 80.00 y 600.99
                'disponibilidad' => $i % 3 != 0, // Disponible 2/3 de las veces
                'descripcion' => 'Este hotel ofrece ' . ['comodidades modernas', 'un ambiente relajante', 'vistas espectaculares', 'servicio excepcional', 'un diseño único'][$i % 5] . '.',
                'comentarios' => ['Muy cómodo', 'Excelente servicio', 'Recomendado para familias', 'Perfecto para parejas', 'Una experiencia única'][$i % 5],
            ];
        }

        DB::table('hoteles')->insert($hoteles);
    }
}
