<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('categoryBrand', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('category_id')->length(11)->unsinged();
            $table->string('brand_id')->length(11)->unsinged();
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
          Schema::drop('categoryBrand');
    }
}
