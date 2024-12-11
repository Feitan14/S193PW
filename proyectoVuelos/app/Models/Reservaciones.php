<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Reservaciones extends Model
{
    use HasFactory;

    protected $table = 'reservaciones';


    protected $fillable = [
        'user_id', 
        'total'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function vuelos()
    {
        return $this->belongsToMany(Vuelos::class, 'reservacion_vuelo');
    }

    public function hoteles()
    {
        return $this->belongsToMany(Hoteles::class, 'reservacion_hotel');
    }
}
