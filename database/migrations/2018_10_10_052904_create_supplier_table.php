<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('supplier', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('supplier_name',250);
            $table->string('mobile',20);
            $table->string('email',250);
            $table->string('contact_person_name',250);
            $table->string('contact_mobile',20);
            $table->tinyInteger('status');
            $table->mediumText('address');
            $table->string('image');
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
      Schema::drop('supplier');
    }
}
