<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('customer', function (Blueprint $table) {
            $table->increments('id',11);
            $table->tinyInteger('type')->comment = "1=cash 2=pary 3=hp";
            $table->string('customer_name',250);
            $table->string('mobile',20);
            $table->string('email',250);
            $table->mediumText('address');
            $table->string('image');
            $table->string('g1_name',250);
            $table->string('g1_mobile',20);
            $table->string('g1_email',250);
            $table->mediumText('g1_address');
            $table->string('g1_image');
            $table->string('g2_name',250);
            $table->string('g2_mobile',20);
            $table->string('g2_email',250);
            $table->mediumText('g2_address');
            $table->string('g2_image');
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
        Schema::drop('customer');
    }
}
