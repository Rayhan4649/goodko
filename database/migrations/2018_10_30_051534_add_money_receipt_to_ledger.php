<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoneyReceiptToLedger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
      Schema::table('ledger', function($table) {
      $table->integer('money_receipt')->after('invoice');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('ledger', function($table) {
       $table->dropColumn('money_receipt');
        });
    }
}
