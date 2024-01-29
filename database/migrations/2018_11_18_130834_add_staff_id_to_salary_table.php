<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStaffIdToSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
        {
         Schema::table('salary', function($table) {
         $table->integer('staff_id')->length(11)->unsigned()->after('id');
         $table->foreign('staff_id')->references('id')->on('staff')->onDelete('restrict')->onUpdate('cascade');
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
       $table->dropColumn('staff_id');
        });
    }
}
