<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
          public function up()
            {
            Schema::create('setting', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('branch_id')->length(11)->unsigned();
            $table->string('company_name',250);
            $table->mediumText('address');
            $table->string('phone',20) ;
            $table->string('mobile',20) ;
            $table->string('email',250) ;
            $table->string('website',250) ;
            $table->decimal('vat',40,2) ;
            $table->string('vat_reg',250) ;
            $table->string('vat_area_code',250) ;
            $table->tinyInteger('invoice_size')->comment = " 1 = small
             2 = medium 3 = large";
            $table->string('sms_user',250) ;
            $table->string('sms_password',250) ;
            $table->string('smtp_user',250) ;
            $table->string('smtp_password',250) ;
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
         Schema::drop('setting');
    }
}
