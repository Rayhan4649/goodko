<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransactionIdToCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
      Schema::table('collection', function($table) {
      $table->string('transaction_id',250)->after('payment_method');
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
       $table->dropColumn('transaction_id');
        });
    }

}
