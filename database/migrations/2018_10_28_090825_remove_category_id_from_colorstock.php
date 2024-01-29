<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCategoryIdFromColorstock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
            Schema::table('colorstock', function($table) {
            $table->dropColumn('category_id');
         
          });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colorstock', function($table) {
        $table->integer('category_id');
             
          });
    }
}
