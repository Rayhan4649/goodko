<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
         public function up()
            {
            Schema::create('balance_transfer', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('branch_id')->length(11)->unsigned();
            $table->decimal('transfer_amount',40,2) ;
            $table->tinyInteger('status')->comment="0 pending 1 = approved by admin 2 = reject by admin" ;
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
         Schema::drop('balance_transfer');
    }
}
