<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('expense_history', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('branch_id')->length(11)->unsigned()->comment = "0 = owner expense 1 = branch expense";
            $table->integer('memo_no')->length(11)->unsigned();
            $table->integer('category')->length(11)->unsigned();
            $table->foreign('category')->references('id')->on('expense_category')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('amount',40 , 2);
            $table->string('service_provider',250);
            $table->string('service_provider_memo_no',250);
            $table->mediumText('remarks');
            $table->time('expense_time');
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
         Schema::drop('expense_history');
    }
}
