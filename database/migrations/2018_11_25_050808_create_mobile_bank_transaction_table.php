<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileBankTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
            {
            Schema::create('mobile_bank_transaction', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('cashbook_id')->length(11)->unsigned();
            $table->integer('branch_id')->length(11)->unsigned()->comment="0 = admint 0 < baranch manager";
            $table->integer('mobile_bank_account_id')->length(11)->unsigned();
            $table->foreign('mobile_bank_account_id')->references('id')->on('mobile_bank_account')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('invoice_no')->length(11)->unsigned();
            $table->integer('memo_no')->length(11)->unsigned();
            $table->decimal('send_amount',40,2)->comment="send amount from mobile account";
            $table->decimal('receive_amount',40,2)->comment="get amount form other sources";
            $table->tinyInteger('status')->comment = "1 = bank account previous balance 2 = cash  3 = hp 4 = party";
            $table->string('from_mobile',40) ;
            $table->string('transaction_number',250) ;
            $table->mediumText('purpose') ;
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->date('created_time');
            $table->date('transaction_date');
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
         Schema::drop('mobile_bank_transaction');
    }
}
