<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerDueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('customer_due', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('customer_id')->length(11)->unsigned();
            $table->decimal('total_due_amount', 40, 2);
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
       Schema::drop('customer_due');
    }
}
