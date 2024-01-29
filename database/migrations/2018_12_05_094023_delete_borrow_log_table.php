<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteBorrowLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
          public function up()
            {
            Schema::create('delete_borrow_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->decimal('amount', 40, 2);
            $table->decimal('previous_pettycash', 40, 2);
            $table->tinyInteger('status')->comment = " 1 = delete payable amount 2 = delete return amount";
            $table->mediumText('remarks');
            $table->date('befor_created_date');
            $table->time('created_time');
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
         Schema::drop('delete_borrow_log');
    }
}
