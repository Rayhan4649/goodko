<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchStatusToExpenseCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
      Schema::table('expense_category', function($table) {
      $table->tinyInteger('branch_status')->after('id')->comment = "1 not allwoed for branch 2 = allowed for branch";
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('expense_category', function($table) {
       $table->dropColumn('branch_status');
        });
    }
}
