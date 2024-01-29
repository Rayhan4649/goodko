<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
           public function up()
            {
            Schema::create('sale', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('invoice')->length(11)->unsigned();
            $table->integer('customer_id')->length(11)->unsigned();
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('restrict')->onUpdate('cascade');
            $table->tinyInteger('customer_type')->comment = "1 = cash 2 = hp 3 =party";;
            $table->integer('branch_id')->length(11)->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('total_quantity')->length(11)->unsigned();
            $table->decimal('total_price', 40, 2);
            $table->decimal('total_payment', 40, 2);
            $table->decimal('total_discount', 40, 2);
            $table->tinyInteger('status');
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
         Schema::drop('purchase');
    }
}
