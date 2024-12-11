<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Http\Controllers\ControladorVistas;

class CreatePrendasTable extends Migration
{
    public function up()
    {
        Schema::create('prendas', function (Blueprint $table) {
            $table->id();
            $table->string('prenda');
            $table->string('color');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prendas');
    }
}