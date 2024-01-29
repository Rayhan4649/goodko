<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalesAmountToStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('stock', function($table) {
      $table->decimal('sales_amount', 40 , 2)->after('purchase_amount');
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
       $table->dropColumn('sales_amount');
        });
    }
}
