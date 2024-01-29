<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddM2cToCashbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
        {
         Schema::table('cashbook', function($table) {
         $table->decimal('m2c',40,2)->after('b2c'); 
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
       $table->dropColumn('m2c');
    });
    }
}
