<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordChangeHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
            Schema::create('password_change_history', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('admin_id')->length(11)->unsigned();
            $table->string('password',100);
            $table->string('reconver_code',100);
            $table->tinyInteger('type')->comment="1= admin 2 = manager";
            $table->tinyInteger('status')->comment="1= by normal change 2 = forgotten password";
            $table->time('created_time');
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
           Schema::drop('password_change_history');
    }
}
