<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
            Schema::create('sale_product', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('invoice_number')->length(11)->unsigned();
            $table->integer('customer_id')->length(11)->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('branch_id')->length(11)->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('product_id')->length(11)->unsigned();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('color_id')->length(11)->unsigned();
            $table->foreign('color_id')->references('id')->on('color')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('purcahse_price', 40, 2)->comment = "per unit";
            $table->decimal('sale_price', 40, 2)->comment = "per unit";
            $table->integer('total_quantity')->length(11)->unsigned();
            $table->decimal('total_price', 40, 2);
            $table->tinyInteger('status');
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
           Schema::drop('sale_product');
    }
}
