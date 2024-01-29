<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveNoteIdFromPaymentLedger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
             Schema::table('payment_ledger', function($table) {
             $table->dropColumn('note_id');
         
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_ledger', function($table) {
        $table->integer('note_id');   
        });
    }
}
