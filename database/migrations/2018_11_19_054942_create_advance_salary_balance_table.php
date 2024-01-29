<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvanceSalaryBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
           public function up()
            {
            Schema::create('advance_salary_balance', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('staff_id')->length(11)->unsigned();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('balance',40,2) ;
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
         Schema::drop('advance_salary_balance');
    }
}
