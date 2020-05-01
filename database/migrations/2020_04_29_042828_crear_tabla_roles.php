<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('idRol')->comment('Identificador del registro en la tabla Auto Incremental');
            $table->string('codigo', 80)->comment('Codigo unico identificador del rol');
            $table->string('nombreRol', 100)->comment('Codigo unico identificador del rol');
            $table->enum('indicadorHabilitado', ['SI', 'NO'])->default('SI')->comment('El registro está habilitado');            
            $table->timestamp('fechaCreacion', 0)->nullable();
            $table->timestamp('fechaActualizacion', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
