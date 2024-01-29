<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
         public function up()
            {
            Schema::create('borrow', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('borrow_name',250);
            $table->string('borrow_mobile',20);
            $table->string('borrow_email',250);
            $table->string('relation',10);
            $table->tinyInteger('status');
            $table->mediumText('address');
            $table->integer('added_id')->length(11)->unsigned();
            $table->foreign('added_id')->references('id')->on('admin')->onDelete('restrict')->onUpdate('cascade');
            $table->string('image',250);
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
         Schema::drop('borrow');
    }
}
