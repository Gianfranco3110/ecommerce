<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PromosEnvio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('promosEnvios', function (Blueprint $table) {
      
            $table->double('valorDescuento');
            $table->double('valorCompra'); 
            $table->enum('tipoDescuento', ['porcentaje', 'valorNeto'])->default('valorNeto');
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
    }
}
