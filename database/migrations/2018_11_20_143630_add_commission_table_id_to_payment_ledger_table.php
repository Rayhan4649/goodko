<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommissionTableIdToPaymentLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
        {
         Schema::table('payment_ledger', function($table) {
         $table->integer('commission_table_id')->length(11)->unsigned()->after('money_receipt')->comment=" 0 = not commmisson columt 0 < commission colum";
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
       $table->dropColumn('commission_table_id');
        });
    }
}
