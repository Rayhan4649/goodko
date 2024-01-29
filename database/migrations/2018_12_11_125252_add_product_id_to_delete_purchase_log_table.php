<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductIdToDeletePurchaseLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('delete_purchase_log', function($table) {
         $table->integer('branch_id')->lenght(11)->unsigned()->after('id');
         $table->integer('product_id')->lenght(11)->unsigned()->after('branch_id'); 
         $table->integer('color_id')->lenght(11)->unsigned()->after('product_id'); 
         $table->mediumText('serial')->after('total_price'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */   
    public function down()
    {
       Schema::table('delete_purchase_log', function($table) {
       $table->dropColumn('branch_id');
       $table->dropColumn('product_id');
       $table->dropColumn('color_id');
       $table->dropColumn('serial');
    });
}
}
