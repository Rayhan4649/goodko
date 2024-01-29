<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('model', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('category_id')->length(11)->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('brand_id')->length(11)->unsigned();
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('restrict')->onUpdate('cascade');
            $table->string('model_name',250);
            $table->mediumText('remarks');
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
         Schema::drop('model');
    }
}
