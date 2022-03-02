<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_paths', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('qualification')->nullable();
            $table->text('reward')->nullable();
            $table->text('income')->nullable();
            $table->string('claim_message')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('bonus_path_id')->unsigned()->nullable();
            $table->foreign('bonus_path_id')->references('id')
                ->on('bonus_paths');
        });

        Schema::table('achievement_approvals', function(Blueprint $table) {
            $table->integer('bonus_path_id')->after('advanced_achievement_level_id')->unsigned()->nullable();
            $table->foreign('bonus_path_id')->references('id')
                ->on('bonus_paths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achievement_approvals', function(Blueprint $table) {
            $table->dropForeign('achievement_approvals_bonus_path_id_foreign');
        });

        Schema::table('achievement_approvals', function(Blueprint $table) {
            $table->dropColumn('bonus_path_id');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_bonus_path_id_foreign');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('bonus_path_id');
        });

        Schema::dropIfExists('bonus_paths');
    }
}
