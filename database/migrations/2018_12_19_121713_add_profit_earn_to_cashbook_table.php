<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfitEarnToCashbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('cashbook', function($table) {
         $table->decimal('profit_earn',40,2)->after('balance_transfer_type');
         $table->decimal('profit_cost',40,2)->after('profit_earn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */   
    public function down()
    {
       Schema::table('cashbook', function($table) {
       $table->dropColumn('profit_earn');
       $table->dropColumn('profit_cost');
    });
}
}
