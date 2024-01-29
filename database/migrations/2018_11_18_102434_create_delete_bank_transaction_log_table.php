<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteBankTransactionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('delete_bank_transaction_log', function (Blueprint $table) {
        $table->increments('id',11);
        $table->integer('added_id')->length(11)->unsigned();
        $table->integer('delete_id')->length(11)->unsigned();
        $table->integer('branch_id')->length(11)->unsigned()->comment = " 0 == Owner 0< Branch";
        $table->integer('bank_id')->length(11)->unsigned();
        $table->decimal('befor_bank_balance',40,2);
        $table->decimal('befor_pettycash_balance',40,2);
        $table->decimal('amount',40,2);
        $table->tinyInteger('status')->comment = "1 == Previous 2 = c2b 3 =b2c";
        $table->string('info_paper',250);
        $table->string('image',250);
        $table->mediumText('before_remarks');
        $table->mediumText('after_remarks');
        $table->date('transaction_date');
        $table->date('before_created_at');
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
        Schema::drop('delete_bank_transaction_log');
    }
}
