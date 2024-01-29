<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileBankBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
            {
            Schema::create('mobile_bank_balance', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('mobile_bank_account_id')->length(11)->unsigned();
            $table->foreign('mobile_bank_account_id')->references('id')->on('mobile_bank_account')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('total_balance',40,2);
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->date('created_at');
            $table->date('modified_at');
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('mobile_bank_balance');
    }
}
