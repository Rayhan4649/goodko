<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvoiceTypeToProductSerialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::table('product_serial', function($table) {
      $table->tinyInteger('invoice_type')->after('id')->comment = "1=stock invoice 2 = purchase 3 =cash sale 4 = hp sale 5 = party sale";
      $table->tinyInteger('invoice_no')->after('invoice_type');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('product_serial', function($table) {
       $table->dropColumn('invoice_type');
      $table->dropColumn('invoice_no');
     });
    }
}
