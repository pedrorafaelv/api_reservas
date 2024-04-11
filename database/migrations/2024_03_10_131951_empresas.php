<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->string('telefono');
            $table->string('email');
            $table->unsignedBigInteger('industria_id');
            $table->date('fundacion')->nullable();
            $table->integer('ingresos')->nullable();
            $table->string('sitio_web')->nullable();
            $table->text('descripcion');
            $table->time('time_start')->nullable();
            $table->time('time_off')->nullable();
            $table->foreign('industria_id')->references('id')->on('industrias')->onDelete('cascade');
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
        Schema::dropIfExists('empresas');

    }
}

