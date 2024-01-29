<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollectTimeToCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
      Schema::table('collection', function($table) {
      $table->time('collect_time')->after('added_id');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('collection', function($table) {
       $table->dropColumn('collect_time');
        });
    }
}
