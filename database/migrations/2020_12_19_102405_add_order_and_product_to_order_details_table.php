<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderAndProductToOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->string('id_order')->index();
            $table->foreign('id_order')->references('id')->on('orders');
            $table->unsignedBigInteger('id_product')->index();
            $table->foreign('id_product')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign(['id_order']);
            $table->dropColumn('id_order');
            $table->dropForeign(['id_product']);
            $table->dropColumn('id_product');
        });
    }
}
