<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('destino');
            $table->string('fechas'); // Intervalo de fechas en texto (puede cambiarse a otro formato si es necesario)
            $table->integer('no_habitaciones');
            $table->integer('no_huespedes');
            $table->string('nombre_hotel');
            $table->decimal('calificacion', 3, 2); // Ejemplo: 4.85
            $table->integer('no_estrellas'); // De 1 a 5 estrellas
            $table->decimal('precio_noche', 10, 2); // Precio por noche con hasta 2 decimales
            $table->integer('disponibilidad');
            $table->text('descripcion'); // Descripción del hotel
            $table->text('comentarios')->nullable(); // Comentarios opcionales
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoteles');
    }
};
