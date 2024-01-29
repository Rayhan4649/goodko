<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockLimitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
            {
            Schema::create('stock_limit', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('limit_number')->length(11)->unsigned();
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
         Schema::drop('stock_limit');
    }
}
