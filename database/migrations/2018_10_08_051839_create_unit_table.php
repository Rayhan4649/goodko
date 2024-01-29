<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('unit', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('unit_name',250);
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
       Schema::drop('unit');
    }
}
