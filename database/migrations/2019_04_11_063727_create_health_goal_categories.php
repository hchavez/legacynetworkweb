<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthGoalCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_health_goal_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });

        \App\Models\UserHealthGoalCategories::create([
            'name' => 'Health',
            'description' => 'Health Success Compass',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        \App\Models\UserHealthGoalCategories::create([
            'name' => 'Business',
            'description' => 'Business Success Compass',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        Schema::table('user_health_goals', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->after('goal')->default(1);
            $table->foreign('category_id')
                ->references('id')->on('user_health_goal_categories');
        });

        Schema::table('user_next_step_goals', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->after('goal')->default(1);
            $table->foreign('category_id')
                ->references('id')->on('user_health_goal_categories');
        });

        Schema::table('user_goal_results', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->after('result')->default(1);
            $table->foreign('category_id')
                ->references('id')->on('user_health_goal_categories');
        });

        Schema::table('user_health_actions', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->after('week')->default(1);
            $table->foreign('category_id')
                ->references('id')->on('user_health_goal_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_health_actions', function (Blueprint $table) {
            $table->dropForeign('user_health_actions_category_id_foreign');
        });
        Schema::table('user_health_actions', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });

        Schema::table('user_goal_results', function (Blueprint $table) {
            $table->dropForeign('user_goal_results_category_id_foreign');
        });
        Schema::table('user_goal_results', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });

        Schema::table('user_next_step_goals', function (Blueprint $table) {
            $table->dropForeign('user_next_step_goals_category_id_foreign');
        });
        Schema::table('user_next_step_goals', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });

        Schema::table('user_health_goals', function (Blueprint $table) {
            $table->dropForeign('user_health_goals_category_id_foreign');
        });
        Schema::table('user_health_goals', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('user_health_goal_categories');
    }
}
