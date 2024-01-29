<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestorTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
            {
            Schema::create('investor', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('investor_name',250);
            $table->string('investor_mobile',20);
            $table->string('investor_email',250);
            $table->string('relation',10);
            $table->tinyInteger('status');
            $table->mediumText('address');
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
         Schema::drop('investor');
    }
}
