<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToCashbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
         Schema::table('cashbook', function($table) {
         $table->integer('type')->after('id')->comment = "0 purchase and 1 = cash sale 2 = hp sale 3 = party"; ;
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
        $table->dropColumn('type');
         });
    }
}
