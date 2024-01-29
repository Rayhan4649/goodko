<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSerialToSaleProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
         Schema::table('sale_product', function($table) {
         $table->mediumText('serial')->after('total_price');
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('sale_product', function($table) {
       $table->dropColumn('serial');
        });
    }
}
