<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveStaffIdFromSalaryPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
             Schema::table('salary_payment', function($table) {
             $table->dropColumn('staff_id');
         
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
        $table->integer('staff_id');   
        });
    }
}
