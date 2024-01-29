<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductIdToPurchaseLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_log', function($table) {
        $table->integer('product_id')->length(11)->unsigned()->after('invoice_number');
        $table->foreign('product_id')->references('id')->on('product')->onDelete('restrict')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_log', function($table) {
        $table->dropColumn('product_id');
         });
    }
}
