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
        Schema::create('detalle_entradas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger("IdEntrada");
            $table->unsignedBigInteger("IdProducto");
            $table->decimal('PrecioCompra', 8, 2);
            $table->integer('Cantidad');
            $table->decimal('SubTotal', 8, 2);
            $table->foreign('IdEntrada')->references('id')->on('entradas')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('IdProducto')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');;
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
        Schema::dropIfExists('detalle_entradas');
    }
};
