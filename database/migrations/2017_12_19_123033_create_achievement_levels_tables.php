<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementLevelsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievement_level_groups', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('achievement_levels', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('qualification');
            $table->text('reward');
            $table->string('claim_message')->nullable();
            $table->integer('level');
            $table->integer('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')
                ->on('achievement_level_groups');
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('achievement_level_id')->unsigned()->nullable()->default(1);
            $table->foreign('achievement_level_id')->references('id')
                ->on('achievement_levels');
        });

        Schema::create('advanced_achievements', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('qualification');
            $table->text('reward');
            $table->timestamps();
        });

        Schema::create('user_advanced_achievements', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users');

            $table->integer('advanced_achievement_id')->unsigned()->nullable();
            $table->foreign('advanced_achievement_id')->references('id')
                ->on('advanced_achievements');

            $table->timestamps();
        });

        Schema::create('achievement_approvals', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users');

            $table->integer('achievement_level_id')->unsigned()->nullable();
            $table->foreign('achievement_level_id')->references('id')
                ->on('achievement_levels');

            $table->integer('advanced_achievement_level_id')->unsigned()->nullable();
            $table->foreign('advanced_achievement_level_id')->references('id')
                ->on('achievement_levels');

            $table->enum('status', ['approved', 'pending', 'disapproved'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_achievement_level_id_foreign');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('achievement_level_id');
        });

        Schema::dropIfExists('achievement_approvals');
        Schema::dropIfExists('user_advanced_achievements');
        Schema::dropIfExists('advanced_achievements');
        Schema::dropIfExists('achievement_levels');
        Schema::dropIfExists('achievement_level_groups');
    }
}
