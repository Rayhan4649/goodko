<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
            {
            Schema::create('staff', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('branch_id')->length(11)->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('desi_id')->length(11)->unsigned();
            $table->foreign('desi_id')->references('id')->on('designation')->onDelete('restrict')->onUpdate('cascade');
            $table->string('name',250);
            $table->string('father_name',250);
            $table->string('mother_name',250);
            $table->string('mobile',20);
            $table->string('email',250);
            $table->mediumText('edu');
            $table->string('nid',250);
            $table->tinyInteger('sex');
            $table->date('join_date');
            $table->string('birth_certificate',250);
            $table->mediumText('perment_address');
            $table->mediumText('present_address');
            $table->string('ref_person',250);
            $table->string('ref_person_mobile',20);
            $table->tinyInteger('status')->comment = "1 = active 2 = not active";
            $table->mediumText('remarks');
            $table->string('image',250);
            $table->string('image1',250);
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
         Schema::drop('staff');
    }
}
