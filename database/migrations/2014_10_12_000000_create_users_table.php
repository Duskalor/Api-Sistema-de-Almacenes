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
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('FullName');
            $table->string('Email')->unique();
            $table->string('Usuario');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('Password');
            $table->unsignedBigInteger('IdPermisos');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('IdPermisos')->references('id')->on('permisos'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
