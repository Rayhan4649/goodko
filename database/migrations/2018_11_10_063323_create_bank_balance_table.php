<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
            {
            Schema::create('bank_balance', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('bank_id')->length(11)->unsigned();
            $table->foreign('bank_id')->references('id')->on('bank')->onDelete('restrict')->onUpdate('cascade');
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
         Schema::drop('bank_balance');
    }
}
