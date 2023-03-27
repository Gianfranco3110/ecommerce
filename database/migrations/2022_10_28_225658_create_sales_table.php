<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('reference');//no se para que es esto lo dejare pero no lo usare
            $table->string('delivery');//eliminar
            $table->string('customer');//eliminar
            $table->longtext('productos');//eliminar
            $table->string('total');
            $table->string('payment');
            $table->string('coupon')->nullable();
            $table->string('status');
            $table->date('date');//eliminar para esto esta el timestamps
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
        Schema::dropIfExists('sales');
    }
}
