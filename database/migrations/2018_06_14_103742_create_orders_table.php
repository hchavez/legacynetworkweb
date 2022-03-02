<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->integer('activation_pack_id')->unsigned()->nullable();
            $table->string('activation_pack_name')->nullable();
            $table->float('activation_pack_price', 15, 2)->nullable();
            $table->text('activation_pack_desc')->nullable();
            $table->integer('auto_ship_id')->unsigned()->nullable();
            $table->string('auto_ship_name')->nullable();
            $table->float('auto_ship_price', 15, 2)->nullable();
            $table->text('auto_ship_desc')->nullable();
            $table->integer('ln_fee_id')->unsigned()->nullable();
            $table->string('ln_fee_name')->nullable();
            $table->float('ln_fee_price', 15, 2)->nullable();
            $table->text('ln_fee_desc')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->foreign('activation_pack_id')->references('id')
                ->on('activation_packs');
            $table->foreign('auto_ship_id')->references('id')
                ->on('auto_ships');
            $table->foreign('ln_fee_id')->references('id')
                ->on('ln_fees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
