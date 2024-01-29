<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductIdToStockHistoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
        {
         Schema::table('stock_history_product', function($table) {
         $table->integer('product_id')->length(11)->unsigned()->after('branch_id') ;
         $table->foreign('product_id')->references('id')->on('product')->onDelete('restrict')->onUpdate('cascade');
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('stock_history_product', function($table) {
       $table->dropColumn('product_id');
        });
    }
}
