<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewSuccessCompass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_health_goals', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->string('goal');
            $table->timestamp('due_date');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('health_goal_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('health_goal_id')->unsigned();
            $table->foreign('health_goal_id')
                ->references('id')->on('user_health_goals');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_next_step_goals', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->string('goal');
            $table->timestamp('due_date');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_goal_results', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->text('result');
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
        Schema::dropIfExists('user_goal_results');
        Schema::dropIfExists('user_next_step_goals');
        Schema::dropIfExists('health_goal_items');
        Schema::dropIfExists('user_health_goals');
    }
}
