<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cid')->nullable()->unsigned();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('email', 100);
            $table->string('mobileno', 30);
            $table->string('address1', 255);
            $table->string('address2', 255)->nullable();
            $table->string('zipcode', 10);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('country', 100);
            $table->string('checkout_as', 100);
            $table->string('payment_method', 100);
            $table->text('comment')->nullable();
            $table->foreign('cid')->references('id')->on('customers')->onDelete('restrict')->onUpdate('no action');
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
        Schema::dropIfExists('orders');
    }
}
