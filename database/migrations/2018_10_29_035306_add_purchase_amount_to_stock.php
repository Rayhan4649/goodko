<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPurchaseAmountToStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('stock', function($table) {
      $table->decimal('purchase_amount', 40 , 2)->after('product_id');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('stock', function($table) {
       $table->dropColumn('purchase_amount');
        });
    }
}
