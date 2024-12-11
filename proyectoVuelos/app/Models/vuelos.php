<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservaciones;


class Vuelos extends Model
{
    use HasFactory;

    protected $table = 'vuelos';

    protected $fillable = [
        'numero_vuelo',
        'aerolinea',
        'origen',
        'destino',
        'hora_salida',
        'hora_llegada',
        'duracion',
        'precio',
        'escala',
        'asientos_disponibles',
    ];

    public function reservaciones()
    {
        return $this->belongsToMany(Reservaciones::class, 'reservacion_vuelo');
    }
}
