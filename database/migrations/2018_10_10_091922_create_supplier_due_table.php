<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierDueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('supplier_due', function (Blueprint $table) {
            $table->increments('id',11);
            $table->integer('supplier_id')->length(11)->unsigned();
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
         Schema::drop('supplier_due');
    }
}
