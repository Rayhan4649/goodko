<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockDeleteLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
            Schema::create('stock_delete_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('invoice_no')->length(11)->unsigned();
            $table->integer('branch_id')->length(11)->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('product_id')->length(11)->unsigned();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('color_id')->length(11)->unsigned();
            $table->foreign('color_id')->references('id')->on('color')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('remove_product_purchase_price',40,2);
            $table->decimal('befor_avarage_price',40,2);
            $table->decimal('after_avarage_price',40,2);
            $table->integer('remove_qunatity')->length(11)->unsigned();
            $table->text('serial',250);
            $table->tinyInteger('status');
            $table->mediumText('remarks');
            $table->date('stock_date');
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
        Schema::drop('product_serial');
    }
}
