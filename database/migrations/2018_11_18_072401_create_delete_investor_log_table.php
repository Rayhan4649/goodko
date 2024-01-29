<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteInvestorLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
            Schema::create('delete_investor_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('investor_id')->length(11)->unsigned();
            $table->decimal('befor_investor_balance',40,2);
            $table->decimal('befor_pettycash_balance',40,2);
            $table->decimal('amount',40,2);
            $table->tinyInteger('status')->comment = "1 = receive 2 =return";
            $table->mediumText('before_purpose');
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
        Schema::drop('delete_investor_log');
    }
}
