<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteSalaryPaymentLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('delete_salary_payment_log', function (Blueprint $table) {
        $table->increments('id',11);
        $table->integer('payment_number')->length(11)->unsigned();
        $table->integer('staff_id')->length(11)->unsigned();
        $table->integer('salary_id')->length(11)->unsigned();
        $table->string('year',20);
        $table->string('month',20);
        $table->decimal('befor_pettycash_balance',40,2);
        $table->decimal('amount',40,2);
        $table->decimal('fine',40,2);
        $table->tinyInteger('status')->comment = "1 == regular 2 = bonus ";
        $table->mediumText('before_remarks');
        $table->mediumText('after_remarks');
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
        Schema::drop('delete_salary_payment_log');
    }
}
