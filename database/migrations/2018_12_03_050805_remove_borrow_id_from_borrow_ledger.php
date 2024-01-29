<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBorrowIdFromBorrowLedger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
        Schema::table('borrow_ledger', function($table) {
        $table->dropColumn('borrow_id');
         
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrow_ledger', function($table) {
        $table->integer('borrow_id');   
        });
    }
}
