<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update02ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('productPromo')->nullalble()->default(0);
            $table->integer('valorPromo')->nullalble()->default(0);
            $table->boolean('productTop')->nullalble()->default(0);


            
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
            $table->dropColumn('productPromo');
            $table->dropColumn('productTop');
            $table->dropColumn('valorPromo');

        });
    }
}
