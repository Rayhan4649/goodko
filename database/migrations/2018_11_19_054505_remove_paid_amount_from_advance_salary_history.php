<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePaidAmountFromAdvanceSalaryHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
             Schema::table('advance_salary_history', function($table) {
             $table->dropColumn('paid_amount');
         
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advance_salary_history', function($table) {
        $table->integer('paid_amount');   
        });
    }
}
