<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCashbookIdToBankTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
     Schema::table('bank_transaction', function($table) {
     $table->integer('cashbook_id')->length(11)->unsigned()->after('bank_id');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('bank_transaction', function($table) {
       $table->dropColumn('cashbook_id');
        });
    }
}
