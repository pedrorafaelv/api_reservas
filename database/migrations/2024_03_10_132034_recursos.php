<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('tipo_recurso_id');
            $table->string('nombre');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('tipo_recurso_id')->references('id')->on('tipo_recursos')->onDelete('cascade');
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
        Schema::dropIfExists('rescursos');

    }
}
