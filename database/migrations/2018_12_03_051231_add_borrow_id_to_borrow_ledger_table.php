<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBorrowIdToBorrowLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
        {
         Schema::table('borrow_ledger', function($table) {
          $table->integer('borrow_id')->length(11)->unsigned()->after('id');
            $table->foreign('borrow_id')->references('id')->on('borrow')->onDelete('restrict')->onUpdate('cascade');
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
       $table->dropColumn('borrow_id');
    });
    }
}

