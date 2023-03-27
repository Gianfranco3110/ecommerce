<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update01ShippingCost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipping_cost', function (Blueprint $table) {
      
            $table->dropColumn('valorDescuento');
            $table->dropColumn('valorCompra'); 
            $table->dropColumn('tipoDescuento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipping_cost', function (Blueprint $table) {
           $table->double('valorDescuento',8,2);
            $table->double('valorCompra'); //parametro para aplicar el descuento
          $table->enum('tipoDescuento', ['porcentaje', 'valorNeto'])->default('valorNeto');
        });
    }
}
