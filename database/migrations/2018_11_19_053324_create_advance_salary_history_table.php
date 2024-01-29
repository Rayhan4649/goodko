<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvanceSalaryHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
            {
            Schema::create('advance_salary_history', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('payment_number')->length(11)->unsigned();
            $table->integer('staff_id')->length(11)->unsigned();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('payment_amount',40,2) ;
            $table->tinyInteger('status') ;
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
         Schema::drop('advance_salary_history');
    }
}
