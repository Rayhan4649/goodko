<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
            {
            Schema::create('commission', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('supplier_id')->length(11)->unsigned();
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('restrict')->onUpdate('cascade');
            $table->string('year', 250);
            $table->decimal('amount', 40, 2);
            $table->tinyInteger('status');
            $table->mediumText('remarks');
            $table->string('how_they_pay_us', 250);
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->date('given_date');
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
         Schema::drop('commission');
    }
}
