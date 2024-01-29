<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
          public function up()
            {
            Schema::create('product_transfer', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('invoice_no')->length(11)->unsigned();
            $table->integer('from_branch')->length(11)->unsigned();
            $table->integer('to_branch')->length(11)->unsigned();
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->date('create_time');
            $table->date('transfer_date');
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
         Schema::drop('product_transfer');
    }
}
