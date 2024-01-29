<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCashbookIdToCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
        {
         Schema::table('commission', function($table) {
         $table->integer('cashbook_id')->length(11)->unsigned()->after('id');
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('commission', function($table) {
       $table->dropColumn('cashbook_id');
        });
    }
}
