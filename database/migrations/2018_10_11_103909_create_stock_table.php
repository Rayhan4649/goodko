<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('stock', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('category_id')->length(11)->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('brand_id')->length(11)->unsigned();
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('product_id')->length(11)->unsigned();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('available_stock')->length(11)->unsigned();
            $table->date('last_transaction_date');
            $table->time('last_transaction_time');
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
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
       Schema::drop('stock');
    }
}