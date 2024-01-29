<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveRebateFromPaymentLedger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
             Schema::table('payment_ledger', function($table) {
             $table->dropColumn('rebate');
         
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
        $table->decimal('rebate');   
        });
    }
}
