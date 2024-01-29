<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
          public function up()
            {
            Schema::create('borrow_ledger', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('borrow_id')->length(11)->unsigned();
            $table->foreign('borrow_id')->references('id')->on('investor')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('payable_amount', 40, 2)->comment="for admin";
            $table->decimal('return_amount', 40, 2)->comment="for borrow";
            $table->tinyInteger('status')->comment = " 0 = previous due 1 = payable amount 2 = return amount";
            $table->string('purpose',250);
            $table->mediumText('remarks');
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->date('created_time');
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
         Schema::drop('borrow_ledger');
    }
}