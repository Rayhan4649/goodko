<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
            {
            Schema::create('commission_note', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('note_name');
            $table->mediumText('remarks');
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
         Schema::drop('commission_note');
    }
}
