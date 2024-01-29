<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWarrantyIdToSaleProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('sale_product', function($table) {
         $table->integer('warranty_id')->length(11)->unsigned()->after('total_price') ;
         $table->foreign('warranty_id')->references('id')->on('warranty')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('sale_product', function($table) {
        $table->dropColumn('warranty_id');
         });
    }
}
