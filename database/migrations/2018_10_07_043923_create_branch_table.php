<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('branch', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('name',250);
            $table->string('mobile',20);
            $table->mediumText('address');
            $table->date('start_date');
            $table->date('creatd_at');
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
        Schema::drop('branch');
    }
}
