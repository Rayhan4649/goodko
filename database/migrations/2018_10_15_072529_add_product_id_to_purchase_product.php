<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductIdToPurchaseProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('purchase_product', function($table) {
        $table->integer('product_id')->length(11)->unsigned()->after('brand_id');
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
        Schema::table('purchase_product', function($table) {
        $table->dropColumn('product_id');
         });
    }
}
