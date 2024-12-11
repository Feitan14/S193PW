<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Reservaciones;

class Hoteles extends Model
{

    use HasFactory;
    protected $table = 'hoteles';
    protected $fillable = [
        'destino',
        'fechas',
        'no_habitaciones',
        'no_huespedes',
        'nombre_hotel',
        'calificacion',
        'no_estrellas',
        'precio_noche',
        'disponibilidad',
        'descripcion',
        'comentarios',
    ];

    public function reservaciones()
    {
        return $this->belongsToMany(Reservaciones::class, 'reservacion_hotel');
    }
}
