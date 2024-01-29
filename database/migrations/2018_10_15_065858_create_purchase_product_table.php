<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('purchase_product', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('invoice_number')->length(11)->unsigned();
            $table->integer('supplier_id')->length(11)->unsigned();
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('branch_id')->length(11)->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('category_id')->length(11)->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('brand_id')->length(11)->unsigned();
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('restrict')->onUpdate('cascade');
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
           Schema::drop('purchase_product');
    }
}
