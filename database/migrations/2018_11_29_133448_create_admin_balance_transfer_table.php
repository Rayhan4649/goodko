<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminBalanceTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
            {
            Schema::create('admin_balance_transfer', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('sender_cashbook_id')->length(11)->unsigned()->comment="admin";
            $table->integer('reciver_cashbook_id')->length(11)->unsigned()->comment="manager";
            $table->integer('to_branch_id')->length(11)->unsigned();
            $table->foreign('to_branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('transfer_amount',40,2) ;
            $table->tinyInteger('status') ;
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
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
         Schema::drop('admin_balance_transfer');
    }
}
