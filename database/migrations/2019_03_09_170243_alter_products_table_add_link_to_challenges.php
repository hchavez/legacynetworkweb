<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsTableAddLinkToChallenges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('challenge_id')->unsigned()->nullable();
            $table->foreign('challenge_id')->references('id')
                ->on('challenges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_challenge_id_foreign');
        });

        Schema::table('products', function(Blueprint $table) {
            $table->dropColumn('challenge_id');
        });
    }
}
