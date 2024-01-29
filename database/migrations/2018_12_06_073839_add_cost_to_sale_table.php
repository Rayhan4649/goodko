<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCostToSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
        {
         Schema::table('sale', function($table) {
         $table->decimal('cost',40,2)->after('branch_id'); 
        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('sale', function($table) {
       $table->dropColumn('cost');
    });
    }
}
