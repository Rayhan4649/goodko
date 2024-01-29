<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGetNonCashPaymentToCashbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
        {
         Schema::table('cashbook', function($table) {
         $table->decimal('get_non_cash_payment', 40,2)->after('cost')->comment="receive amount among source not cash. by mobile bank or bank"; 
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('cashbook', function($table) {
       $table->dropColumn('get_non_cash_payment');
    });
    }
}
