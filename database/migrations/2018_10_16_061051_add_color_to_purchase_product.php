<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorToPurchaseProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_product', function($table) {
        $table->integer('color')->length(11)->unsigned()->after('product_id');
         $table->foreign('color')->references('id')->on('color')->onDelete('restrict')->onUpdate('cascade');
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
        $table->dropColumn('color');
         });
    }
}
