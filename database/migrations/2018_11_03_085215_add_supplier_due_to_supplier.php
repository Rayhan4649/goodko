<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSupplierDueToSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
      Schema::table('supplier', function($table) {
      $table->decimal('supplier_due',40,2)->after('address');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('supplier', function($table) {
       $table->dropColumn('supplier_due');
        });
    }
}
