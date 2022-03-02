<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddSynergyFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('synergy_account_number', 50)->nullable()->default(null)->after('remember_token');
            $table->string('synergy_tracking_center_1', 50)->nullable()->default(null)->after('synergy_account_number');
            $table->string('synergy_tracking_center_2', 50)->nullable()->default(null)->after('synergy_tracking_center_1');
            $table->string('synergy_tracking_center_3', 50)->nullable()->default(null)->after('synergy_tracking_center_2');
            $table->double('synergy_left_leg_cv', 15, 8)->nullable()->default(null)->after('synergy_tracking_center_3');
            $table->double('synergy_prev_left_leg_cv', 15, 8)->nullable()->default(null)->after('synergy_left_leg_cv');
            $table->double('synergy_right_leg_cv', 15, 8)->nullable()->default(null)->after('synergy_prev_left_leg_cv');
            $table->double('synergy_prev_right_leg_cv', 15, 8)->nullable()->default(null)->after('synergy_right_leg_cv');
            $table->integer('synergy_personally_sponsored_count')->nullable()->default(null)->after('synergy_prev_right_leg_cv');
            $table->integer('synergy_team_member_count')->nullable()->default(null)->after('synergy_personally_sponsored_count');
            $table->integer('synergy_preferred_customer_count')->nullable()->default(null)->after('synergy_team_member_count');
            $table->integer('synergy_highest_title_id')->nullable()->default(null)->after('synergy_preferred_customer_count');
            $table->string('synergy_highest_title_desc', 50)->nullable()->default(null)->after('synergy_highest_title_id');
            $table->integer('synergy_current_title_id')->nullable()->default(null)->after('synergy_highest_title_desc');
            $table->string('synergy_current_title_desc', 50)->nullable()->default(null)->after('synergy_current_title_id');
            $table->integer('synergy_next_title_id')->nullable()->default(null)->after('synergy_current_title_desc');
            $table->string('synergy_next_title_desc', 50)->nullable()->default(null)->after('synergy_next_title_id');
            $table->integer('synergy_next_highest_title_id')->nullable()->default(null)->after('synergy_next_title_desc');
            $table->string('synergy_next_highest_title_desc', 50)->nullable()->default(null)->after('synergy_next_highest_title_id');
            $table->double('synergy_actual_value', 15, 8)->nullable()->default(null)->after('synergy_next_highest_title_desc');
            $table->double('synergy_prev_value', 15, 8)->nullable()->default(null)->after('synergy_actual_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('synergy_account_number');
            $table->dropColumn('synergy_tracking_center_1');
            $table->dropColumn('synergy_tracking_center_2');
            $table->dropColumn('synergy_tracking_center_3');
            $table->dropColumn('synergy_left_leg_cv');
            $table->dropColumn('synergy_right_leg_cv');
            $table->dropColumn('synergy_personally_sponsored_count');
            $table->dropColumn('synergy_team_member_count');
            $table->dropColumn('synergy_preferred_customer_count');
            $table->dropColumn('synergy_highest_title_id');
            $table->dropColumn('synergy_highest_title_desc');
            $table->dropColumn('synergy_current_title_id');
            $table->dropColumn('synergy_current_title_desc');
            $table->dropColumn('synergy_next_title_id');
            $table->dropColumn('synergy_next_title_desc');
            $table->dropColumn('synergy_next_highest_title_id');
            $table->dropColumn('synergy_next_highest_title_desc');
            $table->dropColumn('synergy_actual_value');
        });
    }
}
