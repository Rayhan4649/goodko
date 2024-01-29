<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletePurchaseLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
            Schema::create('delete_purchase_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('invoice_number')->length(11)->unsigned();
            $table->decimal('befor_avarage_price')->length(11)->unsigned();
            $table->decimal('after_avarage_price')->length(11)->unsigned();
            $table->integer('total_quantity')->length(11)->unsigned();
            $table->decimal('total_price', 40, 2);
            $table->tinyInteger('status');
            $table->date('created_at');
            $table->date('delete_at');
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
           Schema::drop('delete_purchase_log');
    }
}
