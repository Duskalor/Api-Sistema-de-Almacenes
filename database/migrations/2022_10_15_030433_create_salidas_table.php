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
            $table->unsignedBigInteger("IdUsuario");
            $table->boolean("active");
            $table->string('razonSalida', 255)->nullable();
            $table->integer("CantidadProductos")->nullable();
            $table->unsignedBigInteger('IdAlmacenes');
            $table->foreign('IdAlmacenes')->references('id')->on('almacenes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('IdUsuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
