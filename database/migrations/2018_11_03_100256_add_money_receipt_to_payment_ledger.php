<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoneyReceiptToPaymentLedger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
      Schema::table('payment_ledger', function($table) {
      $table->integer('money_receipt')->length(11)->unsigned()->after('invoice');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('payment_ledger', function($table) {
       $table->dropColumn('money_receipt');
        });
    }
}
