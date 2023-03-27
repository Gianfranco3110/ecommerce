<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatalagoPremios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalago_premios', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nombre');
            $table->integer('valorDescuento');
            $table->string('puntosValidar'); //puntos validar este premio
            $table->boolean('status');
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
        Schema::dropIfExists('catalago_premios');
    }
}
