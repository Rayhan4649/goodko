<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePurchasePriceFromPurchaseProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('purchase_product', function($table) {
             $table->dropColumn('purchase_price');
         
          });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('purchase_product', function($table) {
        $table->integer('purchase_price');
             
          });
    }
}
