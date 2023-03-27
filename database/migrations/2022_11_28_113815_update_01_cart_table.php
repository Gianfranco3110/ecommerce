<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update01CartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('code')->nullable();
            $table->string('order_date')->nullable();                                  # Fecha de cuando se desea recibir el pedido
            $table->string('arrived_date')->nullable();        # Fecha de llegada del pedido
            $table->string('status');                                       # Active, Pending, Approved, Cancelled, Finished
            $table->float('total')->default(0.0);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('order_date');
            $table->dropColumn('arrived_date');
            $table->dropColumn('status');
            $table->dropColumn('total');
            $table->dropForeign(['user_id']);

           $table->dropForeign('carts_user_id_foreign');




        });
    }
}
