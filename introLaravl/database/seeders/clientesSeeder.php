<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class clientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
            'nombre' => 'Juan',
            'apellido' => 'perex',
            'correo' => 'juan@gmail.com',
            'telefono' => '1234567891',
        ],
        [
            'nombre' => 'Andrea',
            'apellido' => 'Arredondo',
            'correo' => 'arredondo@gmail.com',
            'telefono' => '9876543210',
        ],
        [
            'nombre' => 'Andres',
            'apellido' => 'Morales',
            'correo' => 'andres@gmail.com',
            'telefono' => '5568163634',
        ]]);
    }
}
