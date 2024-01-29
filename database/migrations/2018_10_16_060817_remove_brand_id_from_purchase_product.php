<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBrandIdFromPurchaseProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
             Schema::table('purchase_product', function($table) {
             $table->dropColumn('brand_id');
         
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
        $table->integer('brand_id');
             
          });
    }
}
