<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDecisionDateToBalanceTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
        {
         Schema::table('balance_transfer', function($table) {
         $table->date('decision_date')->after('created_at'); 
         $table->time('decision_time')->after('decision_date');  
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
       $table->dropColumn('decision_date');
       $table->dropColumn('decision_time');
    });
    }
}
