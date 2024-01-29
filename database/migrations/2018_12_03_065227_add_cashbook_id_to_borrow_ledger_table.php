<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCashbookIdToBorrowLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
        {
         Schema::table('borrow_ledger', function($table) {
         $table->integer('cashbook_id')->after('id'); 
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('borrow_ledger', function($table) {
       $table->dropColumn('cashbook_id');
    });
    }
}
