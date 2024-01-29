<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransactionDateToBorrowLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
        {
         Schema::table('borrow_ledger', function($table) {
         $table->date('transaction_date')->after('added_id'); 
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
       $table->dropColumn('transaction_date');
    });
    }
}
