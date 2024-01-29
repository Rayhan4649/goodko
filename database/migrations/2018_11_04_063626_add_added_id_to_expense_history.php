<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddedIdToExpenseHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
      Schema::table('expense_history', function($table) {
         $table->integer('added_id')->length(11)->unsigned()->after('remarks');
         $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('expense_history', function($table) {
       $table->dropColumn('added_id');
        });
    }
}
