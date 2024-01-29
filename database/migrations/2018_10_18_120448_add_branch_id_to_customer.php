<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchIdToCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer', function($table) {
        $table->integer('branch_id')->length(11)->unsigned()->after('type') ;
        $table->foreign('branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('customer', function($table) {
        $table->dropColumn('branch_id');
         });
    }
}
