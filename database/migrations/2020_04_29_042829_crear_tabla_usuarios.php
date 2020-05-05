<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->unsignedBigInteger('idRol');
            $table->string('usuarioSistema','80');
            $table->string('contrasena');
            $table->string('correoelectronico');
            $table->timestamp('fechaInactivacion', 0)->nullable();
            $table->timestamp('fechaUltimaConexion', 0)->nullable();
            $table->enum('indicadorPrimerIngreso', ['SI', 'NO'])->default('SI');
            $table->enum('indicadorHabilitado', ['SI', 'NO'])->default('SI');
            $table->unsignedBigInteger('AuditoriaUsuario')->unique();
            $table->timestamp('fechaCreacion', 0)->nullable();
            $table->timestamp('fechaActualizacion', 0)->nullable();
            $table->foreign('idRol')->references('idRol')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
