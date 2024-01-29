<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletePaymentLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
            Schema::create('delete_payment_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('memo_no')->length(11)->unsigned();
            $table->integer('supplier_id')->length(11)->unsigned();
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('payment_amount',40,2);
            $table->tinyInteger('status');
            $table->mediumText('remarks');
            $table->date('payment_date');
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
        Schema::drop('delete_payment_log');
    }
}
