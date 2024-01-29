<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDebitAmountToCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
        {
         Schema::table('commission', function($table) {
         $table->decimal('debit_amount',40,2)->after('year');
         $table->decimal('credit_amount',40,2)->after('debit_amount');
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('commission', function($table) {
       $table->dropColumn('debit_amount');
       $table->dropColumn('credit_amount');
        });
    }
}
