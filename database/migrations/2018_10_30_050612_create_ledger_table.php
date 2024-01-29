<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
            {
            Schema::create('ledger', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('invoice')->length(11)->unsigned();
            $table->integer('customer_id')->length(11)->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('restrict')->onUpdate('cascade');
            $table->tinyInteger('customer_type')->comment = "1 = cash 2 = hp 3 =party";;
            $table->integer('branch_id')->length(11)->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('payable_amount', 40, 2);
            $table->decimal('payment_amount', 40, 2);
            $table->decimal('rebate', 40, 2);
            $table->tinyInteger('status')->comment = "0 = previoud due 1 = create invoice 2 = payment collection";
            $table->string('purpose',250);
            $table->mediumText('remarks');
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
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
         Schema::drop('ledger');
    }
}