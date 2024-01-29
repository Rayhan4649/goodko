<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoPaperToBankTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
     Schema::table('bank_transaction', function($table) {
     $table->string('info_paper',250)->after('added_id');
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
       $table->dropColumn('info_paper');
        });
    }
}
