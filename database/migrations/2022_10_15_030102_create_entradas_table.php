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
        Schema::create('entradas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string("NumeroDocumento");
            $table->unsignedBigInteger("IdUsuario");
            $table->unsignedBigInteger("IdProveedor");
            $table->integer("CantidadProductos")->nullable();
            $table->decimal('MontoTotal', 8, 2)->nullable();
            $table->foreign('IdUsuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('IdProveedor')->references('id')->on('proveedors')->onUpdate('cascade')->onDelete('cascade');;
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
        Schema::dropIfExists('entradas');
    }
};
