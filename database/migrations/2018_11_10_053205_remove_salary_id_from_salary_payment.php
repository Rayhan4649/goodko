<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSalaryIdFromSalaryPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
             Schema::table('salary_payment', function($table) {
             $table->dropColumn('salary_id');
         
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salary_payment', function($table) {
        $table->integer('salary_id');   
        });
    }
}
