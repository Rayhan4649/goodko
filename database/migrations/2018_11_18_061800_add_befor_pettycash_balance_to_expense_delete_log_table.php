<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBeforPettycashBalanceToExpenseDeleteLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
        {
         Schema::table('expense_delete_log', function($table) {
         $table->decimal('befor_pettycash_balance')->after('service_provider_memo');
         
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('expense_delete_log', function($table) {
       $table->dropColumn('befor_pettycash_balance');
        });
    }
}
