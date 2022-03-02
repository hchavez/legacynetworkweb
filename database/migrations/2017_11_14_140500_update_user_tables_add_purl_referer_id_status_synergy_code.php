<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTablesAddPurlRefererIdStatusSynergyCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 50)->nullable()->after('id');
            $table->string('middle_name', 50)->nullable()->after('first_name');
            $table->string('last_name', 50)->nullable()->after('middle_name');
            $table->integer('referrer_id')->unsigned()->nullable();
            $table->foreign('referrer_id')->references('id')->on('users');
            $table->boolean('is_training_done')->default(false);
            $table->string('placement')->nullable()->default(null);
            $table->string('purl', 20)->unique()->nullable();
            $table->string('synergy_id', 40)->nullable();
            $table->string('status')->nullable()->default('PENDING');
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('mailing_address_1', 100)->nullable();
            $table->string('mailing_address_2', 100)->nullable();
            $table->string('mailing_city', 50)->nullable();
            $table->string('mailing_state', 10)->nullable();
            $table->string('mailing_postal_code', 15)->nullable();
            $table->string('mailing_country', 30)->nullable();
            $table->string('physical_address_1', 100)->nullable();
            $table->string('physical_address_2', 100)->nullable();
            $table->string('physical_city', 50)->nullable();
            $table->string('physical_state', 10)->nullable();
            $table->string('physical_postal_code', 15)->nullable();
            $table->string('physical_country', 30)->nullable();
            $table->string('mobile', 40)->nullable();
            $table->string('tin_ssn')->nullable()->default(null);
            $table->text('signature')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('cc_name')->nullable()->default(null);
            $table->string('cc_number')->nullable()->default(null);
            $table->string('cc_cvv')->nullable()->default(null);
            $table->date('cc_exp_date')->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::beginTransaction();
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_referrer_id_foreign');
            $table->dropColumn('referrer_id');
            $table->dropTimestamps();
            $table->dropSoftDeletes();
            $table->dropColumn('date_of_birth');
            $table->dropColumn('purl');
            $table->dropColumn('status');
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('gender');
            $table->dropColumn('mailing_address_1');
            $table->dropColumn('mailing_address_2');
            $table->dropColumn('mailing_city');
            $table->dropColumn('mailing_state');
            $table->dropColumn('mailing_postal_code');
            $table->dropColumn('mailing_country');
            $table->dropColumn('physical_address_1');
            $table->dropColumn('physical_address_2');
            $table->dropColumn('physical_city');
            $table->dropColumn('physical_state');
            $table->dropColumn('physical_postal_code');
            $table->dropColumn('physical_country');
            $table->dropColumn('synergy_id');
            $table->dropColumn('mobile');
            $table->dropColumn('is_training_done');
            $table->dropColumn('placement');
            $table->dropColumn('tin_ssn');
            $table->dropColumn('signature');
            $table->dropColumn('avatar');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
        });
        DB::commit();
    }
}
