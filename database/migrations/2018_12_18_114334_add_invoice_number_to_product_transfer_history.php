<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvoiceNumberToProductTransferHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('product_transfer_history', function($table) {
         $table->integer('invoice_number')->lenght(11)->unsigned()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */   
    public function down()
    {
       Schema::table('product_transfer_history', function($table) {
       $table->dropColumn('invoice_number');
    });
}
}
