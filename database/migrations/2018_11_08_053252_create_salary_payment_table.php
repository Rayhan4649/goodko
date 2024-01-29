<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
            {
            Schema::create('salary_payment', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('payment_number')->length(11)->unsigned();
            $table->integer('staff_id')->length(11)->unsigned();
            $table->string('year',250);
            $table->string('month',250);
            $table->decimal('payment_amount',40,2);
            $table->decimal('fine',40,2);
            $table->tinyInteger('status')->comment = "1 = payment 2 = due payment";
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
         Schema::drop('salary_payment');
    }

}
