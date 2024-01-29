<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitToProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function($table) {
        $table->integer('unit')->length(11)->unsigned()->after('brand_id');
        $table->foreign('unit')->references('id')->on('unit')->onDelete('restrict')->onUpdate('cascade');
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
        $table->dropColumn('unit');
    });
    }
}
