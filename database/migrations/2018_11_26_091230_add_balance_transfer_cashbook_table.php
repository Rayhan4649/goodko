<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBalanceTransferCashbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
        {
         Schema::table('cashbook', function($table) {
            $table->decimal('balance_transfer', 40,2)->after('b2c');
            $table->tinyInteger('balance_transfer_type')->after('balance_transfer')->comment="1 = out of pettycash 2 = In of pettycash";
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
       $table->dropColumn('balance_transfer');
       $table->dropColumn('balance_transfer_type');
 
    });
    }
}
