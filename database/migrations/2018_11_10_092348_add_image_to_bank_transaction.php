<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToBankTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
     Schema::table('bank_transaction', function($table) {
     $table->string('image',250)->after('info_paper');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('bank_transaction', function($table) {
       $table->dropColumn('image');
        });
    }
}
