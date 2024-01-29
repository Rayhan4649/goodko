<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('product', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('product_name',250);
            $table->string('product_code',250);
            $table->integer('category_id')->length(11)->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('brand_id')->length(11)->unsigned();
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('unit')->length(11)->unsigned();
            $table->decimal('purchase_amount', 40, 2);
            $table->decimal('sales_amount', 40, 2);
            $table->tinyInteger('status');
            $table->mediumText('des');
            $table->mediumText('remarks');
            $table->string('image');
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
          Schema::drop('product');
    }
}
