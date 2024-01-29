<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSaleTimeToSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
         Schema::table('sale', function($table) {
         $table->time('sale_time')->after('remarks');
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('sale', function($table) {
       $table->dropColumn('sale_time');
    });
    }
}
