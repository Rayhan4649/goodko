<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestorLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
            {
            Schema::create('investor_ledger', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('investor_id')->length(11)->unsigned();
            $table->foreign('investor_id')->references('id')->on('investor')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('receive_amount', 40, 2);
            $table->decimal('return_amount', 40, 2);
            $table->tinyInteger('status')->comment = " 1 = receive amount 2 = return amount";
            $table->string('purpose',250);
            $table->mediumText('remarks');
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
         Schema::drop('investor_ledger');
    }
}
