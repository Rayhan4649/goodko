<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorIdToProductSerialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
        {
         Schema::table('product_serial', function($table) {
         $table->integer('color_id')->length(11)->unsigned()->after('product_id');
         $table->foreign('color_id')->references('id')->on('color')->onDelete('restrict')->onUpdate('cascade');
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
       $table->dropColumn('product_serial');
        });
    }
}
