<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveStaffIdFromSalary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
             Schema::table('salary', function($table) {
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
        Schema::table('salary', function($table) {
        $table->integer('staff_id');   
        });
    }
}
