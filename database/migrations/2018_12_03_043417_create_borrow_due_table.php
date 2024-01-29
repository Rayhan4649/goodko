<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowDueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
            {
            Schema::create('borrow_due', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('borrow_id')->length(11)->unsigned();
            $table->foreign('borrow_id')->references('id')->on('borrow')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('total_due_amount', 40, 2);
            $table->tinyInteger('status');
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
         Schema::drop('borrow_due');
    }
}
