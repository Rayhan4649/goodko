<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMemoNoToStockHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
         Schema::table('stock_history', function($table) {
         $table->string('memo_no',250)->after('invoice') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('stock_history', function($table) {
        $table->dropColumn('memo_no');
         });
    }
}
