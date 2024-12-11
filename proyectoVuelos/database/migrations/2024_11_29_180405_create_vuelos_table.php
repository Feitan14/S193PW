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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_vuelo');
            $table->string('aerolinea');
            $table->string('origen');
            $table->string('destino');
            $table->datetime('hora_salida');
            $table->datetime('hora_llegada');
            $table->integer('duracion');
            $table->decimal('precio', 10, 2);
            $table->boolean('escala');
            $table->integer('asientos_disponibles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
