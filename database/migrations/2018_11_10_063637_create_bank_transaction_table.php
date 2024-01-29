<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
            {
            Schema::create('bank_transaction', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('bank_id')->length(11)->unsigned();
            $table->foreign('bank_id')->references('id')->on('bank')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('send_amount',40,2);
            $table->decimal('receive_amount',40,2);
            $table->tinyInteger('status')->comment = "1 = bank previous balance 2 = balance transaction";
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
         Schema::drop('bank_transaction');
    }
}
