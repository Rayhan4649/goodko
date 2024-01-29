<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
            {
            Schema::create('mobile_bank_account', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('mobile_bank_id')->length(11)->unsigned();
            $table->foreign('mobile_bank_id')->references('id')->on('mobile_bank')->onDelete('restrict')->onUpdate('cascade');
            $table->string('account_no',250);
            $table->tinyInteger('status')->comment = "1 = active 2 = deactive";
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
         Schema::drop('mobile_bank_account');
    }
}


