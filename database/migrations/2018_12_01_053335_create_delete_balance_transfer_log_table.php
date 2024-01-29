<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteBalanceTransferLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
            {
            Schema::create('delete_balance_transfer_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('sender_branch_id')->length(11)->unsigned();
            $table->integer('reciver_branch_id')->length(11)->unsigned();
            $table->decimal('transfer_amount',40,2) ;
            $table->tinyInteger('status') ;
            $table->integer('added_id')->length(11)->unsigned();
            $table->time('transfer_time');
            $table->date('transfer_date');
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
         Schema::drop('delete_balance_transfer_log');
    }
}
