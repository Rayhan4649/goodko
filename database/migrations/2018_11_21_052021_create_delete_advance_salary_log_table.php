<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteAdvanceSalaryLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
            {
            Schema::create('delete_advance_salary_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('payment_number')->length(11)->unsigned();
            $table->integer('staff_id')->length(11)->unsigned();
            $table->decimal('before_pettycash_amount',40,2) ;
            $table->decimal('payment_amount',40,2) ;
            $table->decimal('paid_amount',40,2) ;
            $table->tinyInteger('status')->comment="1 = given payment 2 = staff return payment" ;
            $table->mediumText('before_remarks');
            $table->mediumText('after_remarks');
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->date('befor_transaction_date');
            $table->date('befor_created_at');
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
         Schema::drop('delete_advance_salary_log');
    }
}
