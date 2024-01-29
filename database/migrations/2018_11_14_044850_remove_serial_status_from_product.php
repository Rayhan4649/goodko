<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSerialStatusFromProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
             Schema::table('product', function($table) {
             $table->dropColumn('serial_status');
         
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function($table) {
        $table->integer('serial_status');   
        });
    }
}
