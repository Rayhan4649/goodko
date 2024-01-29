<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHpSalePriceToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('product', function($table) {
         $table->decimal('hp_sale_price',40,2)->after('sales_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */   
    public function down()
    {
       Schema::table('product', function($table) {
       $table->dropColumn('hp_sale_price');
    });
}
}
