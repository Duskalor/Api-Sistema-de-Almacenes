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
            $table->Integer("Salidas");
            $table->Integer("Entradas");
            $table->Integer("Productos");
            $table->Integer("Clientes");
            $table->Integer("Proveedores");
            $table->Integer("Permisos");
            $table->Integer("Usuarios");
            $table->Integer("Configuracion");
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
