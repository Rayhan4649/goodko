<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveGetPaymentMethodToCashbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::table('cashbook', function($table) {
        $table->dropColumn('get_payment_method');
        $table->dropColumn('given_payment_method');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advance_salary_history', function($table) {
        $table->decimal('get_payment_method');
        $table->decimal('given_payment_method');    
        });
    }
}
