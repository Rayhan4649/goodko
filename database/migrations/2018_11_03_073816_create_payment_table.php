<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
            {
            Schema::create('payment', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('memo_no')->length(11)->unsigned();
            $table->integer('account_memo_no')->length(11)->unsigned()->comment = "account holder memo phase number";
            $table->integer('supplier_id')->length(11)->unsigned();
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('payment_amount', 40, 2);
            $table->tinyInteger('status');
            $table->string('purpose',250);
            $table->mediumText('remarks');
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->time('payment_time');
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
         Schema::drop('payment');
    }
}
