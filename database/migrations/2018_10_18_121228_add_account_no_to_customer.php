<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountNoToCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::table('customer', function($table) {
        $table->integer('account_number')->length(11)->unsigned()->after('id') ;
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
         $table->dropColumn('account_number');
         });
    }
}
