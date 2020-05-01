<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFuncionalidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionalidades', function (Blueprint $table) {
            $table->id('idFuncionalidad');
            $table->string('codigo', 80);
            $table->string('nombre', 100);
            $table->unsignedBigInteger('AuditoriaUsuario')->unique();
            $table->timestamp('fechaCreacion', 0)->nullable();
            $table->timestamp('fechaActualizacion', 0)->nullable();
            $table->foreign('AuditoriaUsuario')->references('idUsuario')->on('usuarios');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionalidades');
    }
}
