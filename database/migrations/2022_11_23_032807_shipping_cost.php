<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShippingCost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_cost', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad_origen');
            $table->string('ciudad_destino');
            $table->double('valor',8,2);
            $table->double('valorDescuento',8,2);
            $table->double('valorCompra'); //parametro para aplicar el descuento
            $table->enum('tipoDescuento', ['porcentaje', 'valorNeto'])->default('valorNeto');
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('shipping_cost');
    }
}
