<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBranchIdFromCategorybrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('categorybrand', function($table) {
             $table->dropColumn('branch_id');
         
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::table('categorybrand', function($table) {
            $table->integer('branch_id');
             
          });
    }
}
