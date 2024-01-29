<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeleteCollectionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
            Schema::create('delete_collection_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('branch_id')->length(11)->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('memo_no')->length(11)->unsigned();
            $table->tinyInteger('customer_type')->comment="1=cash 2 = hp 3 = party";
            $table->tinyInteger('payment_method')->comment="1=cash 2 = mobile bank 3 = bank";
            $table->decimal('payment_amount', 40,2);
            $table->mediumText('remarks');
            $table->time('collection_time');
            $table->date('collection_date');
            $table->time('delete_time');
            $table->date('delete_date');
           
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delete_collection_log');
    }
}
