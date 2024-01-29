<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCashbookIdToInvestorLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
     Schema::table('investor_ledger', function($table) {
     $table->integer('cashbook_id')->length(11)->unsigned()->after('id');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('investor_ledger', function($table) {
       $table->dropColumn('cashbook_id');
     });
    }
}
