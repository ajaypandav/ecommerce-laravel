<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('oid')->unsigned();
            $table->integer('pid')->unsigned();
            $table->integer('qty');
            $table->float('unit_price');
            $table->foreign('oid')->references('id')->on('orders')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('pid')->references('id')->on('products')->onDelete('restrict')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
