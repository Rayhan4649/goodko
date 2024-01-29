<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSenderCashbookIdToBalanceTransfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
        {
         Schema::table('balance_transfer', function($table) {
         $table->integer('sender_cashbook_id')->length(11)->unsigned()->after('id'); 
         $table->integer('reciver_cashbook_id')->length(11)->unsigned()->after('sender_cashbook_id');
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
       $table->dropColumn('sender_cashbook_id');
       $table->dropColumn('reciver_cashbook_id');
    });
    }
}
