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
        Schema::create('salidas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string("NumeroDocumento");
            $table->unsignedBigInteger("IdCliente");
            $table->unsignedBigInteger("IdUsuario");            
            $table->integer("CantidadProductos")->nullable();
            $table->decimal('MontoTotal', 8, 2)->nullable();
            $table->foreign('IdCliente')->references('id')->on('clientes');
            $table->foreign('IdUsuario')->references('id')->on('users');
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
        Schema::dropIfExists('salidas');
    }
};
