<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('recurso_id');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('recurso_id')->references('id')->on('recursos')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
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
        Schema::dropIfExists('reservas');

    }
}
