<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PromosSelectEnvios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::create('promos_select_envios', function (Blueprint $table) {

            $table->bigInteger('shipping_cost_id')->unsigned();
            $table->bigInteger('promos_envios_id')->unsigned();
            $table->primary([ 'shipping_cost_id','promos_envios_id']);
            $table->foreign('shipping_cost_id')->references('id')->on('shipping_cost')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('promos_envios_id')->references('id')->on('promos_envios_id')->onDelete('cascade')->onUpdate('cascade');
      
           
        });

    }
}
