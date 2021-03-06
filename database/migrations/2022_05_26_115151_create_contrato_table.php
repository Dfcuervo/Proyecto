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
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->engine='innodb';
            $table->date('fecha');
            $table->string('direccion');

            $table->bigInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->bigInteger('tipopago_id')->unsigned();

            $table->foreign('tipopago_id')->references('id')->on('tipo_pagos')
            ->onDelete("cascade")
            ->onUpdate("cascade");

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
        Schema::dropIfExists('contratos');
    }
};
