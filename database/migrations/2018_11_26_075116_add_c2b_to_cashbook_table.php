<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddC2bToCashbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
         Schema::table('cashbook', function($table) {
            $table->decimal('c2b', 40,2)->after('cost');
            $table->decimal('b2c', 40,2)->after('c2b');
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
       $table->dropColumn('c2b');
       $table->dropColumn('b2c');
 
    });
    }
}
