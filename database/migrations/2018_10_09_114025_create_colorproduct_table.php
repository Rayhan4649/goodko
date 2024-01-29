<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('colorproduct', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('product_id')->length(11)->unsigned();
            $table->integer('color_id')->length(11)->unsigned();
            $table->foreign('color_id')->references('id')->on('color')->onDelete('restrict')->onUpdate('cascade');
            $table->date('created_at');
            $table->date('modified_at');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('colorproduct');
    }
}
