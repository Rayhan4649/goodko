<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentMethodToCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
      Schema::table('collection', function($table) {
      $table->tinyInteger('payment_method')->after('status');
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
       $table->dropColumn('payment_method');
        });
    }

}
