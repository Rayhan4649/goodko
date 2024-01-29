<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('cashbook', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('invoice_prefix',250);
            $table->integer('invoice_number')->length(11)->unsigned();
            $table->decimal('earn', 40, 2);
            $table->decimal('cost', 40, 2);
            $table->tinyInteger('status');
            $table->string('purpose',250);
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
       Schema::drop('cashbook');
    }
}
