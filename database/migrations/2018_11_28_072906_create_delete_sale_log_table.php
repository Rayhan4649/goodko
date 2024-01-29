<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteSaleLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
            Schema::create('delete_sale_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('branch_id')->length(11)->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('invoice_no')->length(11)->unsigned();
            $table->tinyInteger('customer_type')->comment="1=cash 2 = hp 3 = party";
            $table->decimal('total_quantity', 40,2);
            $table->decimal('total_price', 40,2);
            $table->decimal('total_discount', 40,2);
            $table->decimal('total_payment', 40,2);
            $table->decimal('befor_pettycash', 40,2);
            $table->mediumText('remarks');
            $table->time('sale_time');
            $table->date('sale_date');
            $table->time('delete_time');
            $table->date('delete_date');
           
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delete_sale_log');
    }
}
