<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('purchase_log', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('invoice_number')->length(11)->unsigned();
            $table->decimal('previous_avarage_price', 40, 2);
            $table->decimal('present_avarage_price', 40, 2);
            $table->tinyInteger('status')->comment = "1 = UP 2 = DOWN";
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
        Schema::drop('purchase_log');
    }
}
