<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveBrandIdFromStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
            Schema::table('stock', function($table) {
            $table->dropColumn('brand_id');
         
          });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock', function($table) {
        $table->integer('brand_id');
             
          });
    }
}
