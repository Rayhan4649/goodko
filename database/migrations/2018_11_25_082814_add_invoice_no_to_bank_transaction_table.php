<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvoiceNoToBankTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
        {
         Schema::table('bank_transaction', function($table) {
            $table->integer('invoice_no')->length(11)->unsigned()->after('cashbook_id');
            $table->integer('memo_no')->length(11)->unsigned()->after('invoice_no');
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('bank_transaction', function($table) {
       $table->dropColumn('invoice_no');
       $table->dropColumn('memo_no');
 
    });
    }
}
