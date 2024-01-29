<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMemoNoToCashbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
      Schema::table('cashbook', function($table) {
      $table->integer('memo_no')->length(11)->unsigned()->after('invoice_number');
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
       $table->dropColumn('memo_no');
        });
    }
}
