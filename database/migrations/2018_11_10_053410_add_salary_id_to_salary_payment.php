<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalaryIdToSalaryPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
      Schema::table('salary_payment', function($table) {
     $table->integer('salary_id')->length(11)->unsigned()->after('month');
     $table->foreign('salary_id')->references('id')->on('salary')->onDelete('restrict')->onUpdate('cascade');
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
       $table->dropColumn('salary_id');
        });
    }
}
