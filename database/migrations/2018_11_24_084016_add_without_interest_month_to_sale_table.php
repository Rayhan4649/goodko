<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWithoutInterestMonthToSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
         Schema::table('sale', function($table) {
         $table->integer('add_without_interest_month')->after('status')->comment="fot hp customer";
          $table->decimal('interest_percentage',40,2)->after('add_without_interest_month')->comment="fot hp customer";
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
       $table->dropColumn('add_without_interest_month');
       $table->dropColumn('interest_percentage');
    });
    }
}
