<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Upadate01Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('barcode');
            $table->integer('minimaVenta')->default(0);
            $table->integer('stockLowLevel')->default(0);
            $table->boolean('stockNotification')->default(0); //condicional para enviar notificacion de stock low level
            $table->boolean('statuse')->default(0);
            $table->double('valorIva',8,2)->default(0);
            $table->unsignedBigInteger('customer_loyalties_id')->unsigned()->default(0);
            $table->foreign('customer_loyalties_id')->references('id')->on('customer_loyalties')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('barcode');
            $table->dropColumn('minimaVenta');
            $table->dropColumn('stockLowLevel');
            $table->dropColumn('stockNotification');
            $table->dropColumn('poseeIva');
            $table->dropColumn('valorIva');
            $table->bigInteger('customer_loyalties_id')->unsigned();


        });
    }
}
