<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHealthActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_health_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->timestamp('week');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_health_action_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_action_id')->unsigned();
            $table->foreign('health_action_id')
                ->references('id')->on('user_health_actions');
            $table->text('title');
            $table->string('day', 20);
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
        Schema::dropIfExists('user_health_action_items');
        Schema::dropIfExists('user_health_actions');
    }
}
