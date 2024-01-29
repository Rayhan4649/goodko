<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNoteIdToCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
        {
         Schema::table('commission', function($table) {
         $table->integer('note_id')->length(11)->unsigned()->after('payment_type');
        $table->foreign('note_id')->references('id')->on('commission_note')->onDelete('restrict')->onUpdate('cascade');
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
       $table->dropColumn('note_id');
        });
    }
}
