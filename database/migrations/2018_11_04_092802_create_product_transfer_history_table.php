<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTransferHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
            {
            Schema::create('product_transfer_history', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('product_id')->length(11)->unsigned();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('color_id')->length(11)->unsigned();
            $table->foreign('color_id')->references('id')->on('color')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('from_branch_id')->length(11)->unsigned();
            $table->foreign('from_branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
             $table->integer('to_branch_id')->length(11)->unsigned();
            $table->foreign('to_branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('quantity')->length(11)->unsigned();
            $table->tinyInteger('status');
            $table->mediumText('remarks');
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->date('created_time');
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
         Schema::drop('product_transfer_history');
    }
}
