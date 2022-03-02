<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHealthActionItemDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_health_action_items', function (Blueprint $table){
            $table->dropColumn('day');
        });

        Schema::create('user_health_action_item_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uhai_id')->unsigned();
            $table->foreign('uhai_id')
                ->references('id')->on('user_health_action_items');
            $table->string('day', 20);
            $table->boolean('is_complete')->default(false);
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
        Schema::dropIfExists('user_health_action_item_days');

        Schema::table('user_health_action_items', function (Blueprint $table){
            $table->string('day', 20)->after('title');
        });
    }
}
