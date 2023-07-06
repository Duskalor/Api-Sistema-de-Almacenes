<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string("Descripcion");
            $table->boolean("Salidas");
            $table->boolean("Entradas");
            $table->boolean("Productos");
            $table->boolean("Empleados");
            $table->boolean("Proveedores");
            $table->boolean("Permisos");
            $table->boolean("Usuarios");
            $table->boolean("Almacenes");
            $table->boolean("Configuracion");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
};
