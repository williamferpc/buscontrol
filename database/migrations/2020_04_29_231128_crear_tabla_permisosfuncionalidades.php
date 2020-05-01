<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPermisosfuncionalidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisosfuncionalidades', function (Blueprint $table) {
            $table->id('idpermisoFuncionalidad');
            $table->unsignedBigInteger('idfuncionalidad')->unique();
            $table->unsignedBigInteger('idrol')->unique();
            $table->enum('indicadorlectura', ['SI', 'NO'])->default('NO');            
            $table->enum('indicadorescritura', ['SI', 'NO'])->default('NO');           
            $table->timestamp('fechaCreacion', 0)->nullable();
            $table->timestamp('fechaActualizacion', 0)->nullable();
            $table->unsignedBigInteger('AuditoriaUsuario')->unique();
            $table->foreign('idfuncionalidad')->references('idFuncionalidad')->on('funcionalidades');
            $table->foreign('idrol')->references('idRol')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisosfuncionalidades');
    }
}
