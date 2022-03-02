<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreSynergyFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->double('synergy_prev_left_leg_cv', 15, 8)->nullable()->default(null)->after('synergy_left_leg_cv');
            $table->double('synergy_prev_right_leg_cv', 15, 8)->nullable()->default(null)->after('synergy_right_leg_cv');
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
            $table->dropColumn('synergy_prev_left_leg_cv');
            $table->dropColumn('synergy_prev_right_leg_cv');
            $table->dropColumn('synergy_prev_value');
        });
    }
}
