<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('stock');
            $table->double('price');
            $table->string('status');
            $table->string('category');
            $table->string('subcategory');
            $table->longText('description');
            $table->longText('details');
            $table->string('sku');
            $table->string('barcode');
            $table->longText('image');
            $table->string('attributes');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->integer('sales')->default(0)->nullable();
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
        Schema::dropIfExists('products');
    }
}
