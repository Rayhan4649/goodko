<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSerialStatusToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
     Schema::table('product', function($table) {
     $table->tinyInteger('serial_status')->after('sales_amount')->comment="1 = serial product 2 = non serail product";
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
       $table->dropColumn('serial_status');
     });
    }
}
