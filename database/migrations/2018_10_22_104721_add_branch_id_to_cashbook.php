<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchIdToCashbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('cashbook', function($table) {
         $table->integer('branch_id')->after('id')->comment = "0 purchase and 0 < sale"; ;
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
        $table->dropColumn('branch_id');
         });
    }
}
