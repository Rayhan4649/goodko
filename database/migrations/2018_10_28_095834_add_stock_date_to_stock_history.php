<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStockDateToStockHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
         Schema::table('stock_history', function($table) {
         $table->date('stock_date')->after('added_id') ;
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
        $table->dropColumn('stock_date');
         });
    }
}
