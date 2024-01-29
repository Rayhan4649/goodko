<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransferSerialToProductTransferHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
        {
         Schema::table('product_transfer_history', function($table) {
         $table->mediumText('transfer_serial')->after('quantity');
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
       $table->dropColumn('transfer_serial');
        });
    }
}
