<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchIdToBankTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::table('bank_transaction', function($table) {
     $table->integer('branch_id')->length(11)->unsigned()->after('id')->comment = "1 = owner transaction 1 = branch manager transaction";
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
       $table->dropColumn('branch_id');
        });
    }
}
