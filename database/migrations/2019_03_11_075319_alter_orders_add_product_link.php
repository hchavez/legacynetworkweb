<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrdersAddProductLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('product_id')->unsigned()->nullable();
            $table->string('product_name')->nullable();
            $table->float('product_price', 15, 2)->nullable();
            $table->text('product_desc')->nullable();

            $table->foreign('product_id')->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_product_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->dropColumn('product_name');
            $table->dropColumn('product_price');
            $table->dropColumn('product_desc');
        });
    }
}
