<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMemberInvitesAddMoreColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member_invites', function (Blueprint $table) {
            $table->text('body')->nullable()->default(null)->after('is_visited');
            $table->string('subject')->nullable()->default(null)->after('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_invites', function (Blueprint $table) {
            $table->dropColumn('body');
            $table->dropColumn('subject');
        });
    }
}
