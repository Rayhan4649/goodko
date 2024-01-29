<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCollectTimeFromCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
             Schema::table('collection', function($table) {
             $table->dropColumn('collect_time');
         
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collection', function($table) {
        $table->integer('collect_time');   
        });
    }
}
