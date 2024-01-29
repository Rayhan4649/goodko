<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrandIdToCategorybrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::table('categorybrand', function($table) {
        $table->integer('brand_id')->length(11)->unsigned()->after('category_id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorybrand', function($table) {
        $table->dropColumn('brand_id');
    });
    }
}
