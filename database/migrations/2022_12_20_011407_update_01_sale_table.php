<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update01SaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            
            $table->dropColumn('delivery');
            $table->dropColumn('productos');
            $table->dropColumn('customer');

            $table->dropColumn('date');
            $table->bigInteger('delivery_address_id')->nullable()->unsigned();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('cart_id')->nullable()->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('delivery_address_id')->references('id')->on('delivery_address')->onDelete('cascade')->onUpdate('cascade');





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {

            $table->string('delivery');
            $table->string('date');

            $table->longtext('productos');
            $table->string('customer');

            $table->dropForeign('sales_user_id_foreign');
            $table->dropForeign('sales_delivery_address_id_foreign');
            $table->dropForeign('sales_cart_id_foreign');

            $table->dropColumn('user_id');
            $table->dropColumn('cart_id');
            
            $table->dropColumn('delivery_address_id');

            
        });
    }
}
