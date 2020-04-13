<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_cids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bid')->unsigned();
            $table->integer('bcid')->unsigned();
            $table->foreign('bid')->references('id')->on('blogs')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('bcid')->references('id')->on('blog_categories')->onDelete('restrict')->onUpdate('no action');
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
        Schema::dropIfExists('blog_cids');
    }
}
