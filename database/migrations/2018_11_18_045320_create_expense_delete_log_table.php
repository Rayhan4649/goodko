<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseDeleteLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
            Schema::create('expense_delete_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('branch_id')->length(11)->unsigned()->comment= " 0 = admin 0 < branch id";
            $table->integer('memo_no')->length(11)->unsigned();
            $table->string('service_provider',250);
            $table->string('service_provider_memo',250);
            $table->decimal('payment_amount',40,2);
            $table->tinyInteger('status');
            $table->mediumText('befor_remarks');
            $table->mediumText('after_remarks');
            $table->date('expense_date');
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
        Schema::drop('expense_delete_log');
    }
}
