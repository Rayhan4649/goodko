<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantityToLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
        {
         Schema::table('ledger', function($table) {
         $table->integer('quantity')->after('status')->comment="only for creat invoice";
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('ledger', function($table) {
       $table->dropColumn('quantity');
 
    });
    }
}
