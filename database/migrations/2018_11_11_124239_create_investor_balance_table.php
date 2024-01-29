<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestorBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
            {
            Schema::create('investor_balance', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('investor_id')->length(11)->unsigned();
            $table->foreign('investor_id')->references('id')->on('investor')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('toatal_balance', 40, 2);
            $table->tinyInteger('status');
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
         Schema::drop('investor_balance');
    }
}
