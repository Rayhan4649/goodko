<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGetPaymentMethodToCashbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
        {
         Schema::table('cashbook', function($table) {
         $table->tinyInteger('get_payment_method')->after('cost')->comments="receive amount among source . 0 = get by  cash 1 = get not by cash"; 
         $table->tinyInteger('given_payment_method')->after('get_payment_method')->comments="paid payment . 0 = payment by cash cash 1 = payment by not cash"; 
             });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('balance_transfer', function($table) {
       $table->dropColumn('get_payment_method');
       $table->dropColumn('given_payment_method');
    });
    }
}
