<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentTypeToCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
        {
         Schema::table('commission', function($table) {
         $table->tinyInteger('payment_type')->after('amount')->comment=" 1 = debit 2 = creadit";
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
       $table->dropColumn('payment_type');
        });
    }
}
