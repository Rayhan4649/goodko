<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPurchasePriceToStockHistoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
        {
         Schema::table('stock_history_product', function($table) {
         $table->decimal('purchase_price',40 , 2)->after('color');
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
       $table->dropColumn('purchase_price');
        });
    }
}
