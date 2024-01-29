<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemarksToBalanceTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
        {
         Schema::table('balance_transfer', function($table) {
         $table->mediumText('remarks')->after('status');   
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('balance_transfer', function($table) {
       $table->dropColumn('remarks');
    });
    }
}
