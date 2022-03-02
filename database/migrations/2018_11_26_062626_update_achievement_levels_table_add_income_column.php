<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAchievementLevelsTableAddIncomeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achievement_levels', function (Blueprint $table) {
            $table->string('description')->after('name')->nullable();
            $table->text('income')->after('reward')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achievement_levels', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('income');
        });
    }
}
