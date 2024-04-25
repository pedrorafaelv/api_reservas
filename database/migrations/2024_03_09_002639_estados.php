<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'entidad_id');  //id de la entidad
            $table->string( 'nombre');  //Nombre del estado
            $table->foreign('entidad_id')->references('id')->on('entidads')->onDelete('cascade');

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
        //
        Schema::dropIfExists('estados');

    }
}
