<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToCategorybrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorybrand', function($table) {
        $table->integer('category_id')->length(11)->unsigned()->after('id');
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
        $table->dropColumn('category_id');
    });
        //
    }
}
