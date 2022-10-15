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
        Schema::create('detalle_salidas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger("IdSalida");
            $table->unsignedBigInteger("IdProducto");
            $table->decimal('PrecioVenta', 8, 2);
            $table->integer('Cantidad');
            $table->decimal('SubTotal', 8, 2);
            $table->foreign('IdSalida')->references('id')->on('salidas');
            $table->foreign('IdProducto')->references('id')->on('productos');
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
        Schema::dropIfExists('detalle_salidas');
    }
};
