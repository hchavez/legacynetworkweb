<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivationPacksAutoShipsLnFees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activation_packs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->float('price', 15, 2)->nullable();
            $table->longText('description')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('auto_ships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->float('price', 15, 2)->nullable();
            $table->longText('description')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ln_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->float('price', 15, 2)->nullable();
            $table->longText('description')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ln_fees');
        Schema::dropIfExists('auto_ships');
        Schema::dropIfExists('activation_packs');
    }
}
