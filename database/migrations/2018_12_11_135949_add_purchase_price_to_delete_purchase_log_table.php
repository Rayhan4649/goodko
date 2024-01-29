<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPurchasePriceToDeletePurchaseLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delete_purchase_log', function($table) {
         $table->decimal('purchase_price')->after('after_avarage_price');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delete_purchase_log', function($table) {
       $table->dropColumn('purchase_price');
      
    });
    }
}
